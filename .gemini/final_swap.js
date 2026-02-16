import fs from 'fs';

const content = fs.readFileSync('c:/Users/ryano/Herd/tirtabhumi/resources/views/tirtanet.blade.php', 'utf8');
const lines = content.split('\n');

// Find Wireless section (currently first, line ~132)
let wirelessStart = -1;
for (let i = 0; i < lines.length; i++) {
    if (lines[i].includes('EZNET Wireless Section')) {
        wirelessStart = i;
        break;
    }
}

// Find Dedicated section (currently second, line ~232)  
let dedicatedStart = -1;
for (let i = wirelessStart + 1; i < lines.length; i++) {
    if (lines[i].includes('Dedicated Internet Section')) {
        dedicatedStart = i;
        break;
    }
}

// Find end of wireless (look for </section> after wireless start)
let wirelessEnd = -1;
let depth = 0;
for (let i = wirelessStart; i < dedicatedStart; i++) {
    if (lines[i].includes('<section')) depth++;
    if (lines[i].includes('</section>')) {
        depth--;
        if (depth === 0) {
            wirelessEnd = i;
            break;
        }
    }
}

// Find end of dedicated
let dedicatedEnd = -1;
depth = 0;
for (let i = dedicatedStart; i < lines.length; i++) {
    if (lines[i].includes('<section')) depth++;
    if (lines[i].includes('</section>')) {
        depth--;
        if (depth === 0) {
            dedicatedEnd = i;
            break;
        }
    }
}

console.log('Wireless:', wirelessStart, '-', wirelessEnd);
console.log('Dedicated:', dedicatedStart, '-', dedicatedEnd);

// Extract sections
const beforeWireless = lines.slice(0, wirelessStart);
const wirelessSection = lines.slice(wirelessStart, wirelessEnd + 1);
const betweenSections = lines.slice(wirelessEnd + 1, dedicatedStart);
const dedicatedSection = lines.slice(dedicatedStart, dedicatedEnd + 1);
const afterDedicated = lines.slice(dedicatedEnd + 1);

// Reconstruct: before + dedicated + between + wireless + after
const newContent = [
    ...beforeWireless,
    ...dedicatedSection,
    ...betweenSections,
    ...wirelessSection,
    ...afterDedicated
].join('\n');

fs.writeFileSync('c:/Users/ryano/Herd/tirtabhumi/resources/views/tirtanet.blade.php', newContent, 'utf8');
console.log('Done! Dedicated Internet is now FIRST, Wireless is SECOND.');
