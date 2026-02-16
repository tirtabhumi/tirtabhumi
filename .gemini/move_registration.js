import fs from 'fs';

const content = fs.readFileSync('c:/Users/ryano/Herd/tirtabhumi/resources/views/tirtanet.blade.php', 'utf8');
const lines = content.split('\n');

// Find Dedicated section
let dedicatedStart = -1;
for (let i = 0; i < lines.length; i++) {
    if (lines[i].includes('Dedicated Internet Section')) {
        dedicatedStart = i;
        break;
    }
}

// Find Wireless section
let wirelessStart = -1;
for (let i = dedicatedStart + 1; i < lines.length; i++) {
    if (lines[i].includes('EZNET Wireless Section')) {
        wirelessStart = i;
        break;
    }
}

// Find Registration section
let regStart = -1;
for (let i = wirelessStart + 1; i < lines.length; i++) {
    if (lines[i].includes('Alur Pendaftaran Section')) {
        regStart = i;
        break;
    }
}

// Find end of dedicated
let dedicatedEnd = -1;
let depth = 0;
for (let i = dedicatedStart; i < wirelessStart; i++) {
    if (lines[i].includes('<section')) depth++;
    if (lines[i].includes('</section>')) {
        depth--;
        if (depth === 0) {
            dedicatedEnd = i;
            break;
        }
    }
}

// Find end of wireless
let wirelessEnd = -1;
depth = 0;
for (let i = wirelessStart; i < regStart; i++) {
    if (lines[i].includes('<section')) depth++;
    if (lines[i].includes('</section>')) {
        depth--;
        if (depth === 0) {
            wirelessEnd = i;
            break;
        }
    }
}

// Find end of registration
let regEnd = -1;
depth = 0;
for (let i = regStart; i < lines.length; i++) {
    if (lines[i].includes('<section')) depth++;
    if (lines[i].includes('</section>')) {
        depth--;
        if (depth === 0) {
            regEnd = i;
            break;
        }
    }
}

console.log('Dedicated:', dedicatedStart, '-', dedicatedEnd);
console.log('Wireless:', wirelessStart, '-', wirelessEnd);
console.log('Registration:', regStart, '-', regEnd);

// Extract sections
const beforeDedicated = lines.slice(0, dedicatedStart);
const dedicatedSection = lines.slice(dedicatedStart, dedicatedEnd + 1);
const betweenDedicatedWireless = lines.slice(dedicatedEnd + 1, wirelessStart);
const wirelessSection = lines.slice(wirelessStart, wirelessEnd + 1);
const betweenWirelessReg = lines.slice(wirelessEnd + 1, regStart);
const regSection = lines.slice(regStart, regEnd + 1);
const afterReg = lines.slice(regEnd + 1);

// Reconstruct: before + dedicated + registration + wireless + after
const newContent = [
    ...beforeDedicated,
    ...dedicatedSection,
    '',
    ...regSection,
    '',
    ...wirelessSection,
    ...afterReg
].join('\n');

fs.writeFileSync('c:/Users/ryano/Herd/tirtabhumi/resources/views/tirtanet.blade.php', newContent, 'utf8');
console.log('Done! Order: Dedicated -> Registration -> Wireless');
