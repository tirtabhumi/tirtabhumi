import fs from 'fs';

// Read the file
const content = fs.readFileSync('c:/Users/ryano/Herd/tirtabhumi/resources/views/tirtanet.blade.php', 'utf8');
const lines = content.split('\n');

// Find section boundaries
let dedicatedStart = -1, dedicatedEnd = -1;
let wirelessStart = -1, wirelessEnd = -1;

for (let i = 0; i < lines.length; i++) {
    if (lines[i].includes('<!-- Dedicated Internet Section -->')) {
        dedicatedStart = i;
    }
    if (lines[i].includes('<!-- EZNET Wireless Section -->') || lines[i].includes('<!-- Wifi Wireless Section -->')) {
        wirelessStart = i;
        if (dedicatedStart !== -1 && dedicatedEnd === -1) {
            dedicatedEnd = i - 1;
        }
    }
}

// Find end of wireless section
let depth = 0;
for (let j = wirelessStart; j < lines.length; j++) {
    if (lines[j].includes('<section')) depth++;
    if (lines[j].includes('</section>')) {
        depth--;
        if (depth === 0) {
            wirelessEnd = j;
            break;
        }
    }
}

console.log('Dedicated:', dedicatedStart, '-', dedicatedEnd);
console.log('Wireless:', wirelessStart, '-', wirelessEnd);

// Extract sections
const beforeWireless = lines.slice(0, wirelessStart);
const wirelessSection = lines.slice(wirelessStart, wirelessEnd + 1);
const dedicatedSection = lines.slice(dedicatedStart, dedicatedEnd + 1);
const afterDedicated = lines.slice(dedicatedEnd + 1);

// Reconstruct: before + dedicated + wireless + after
const newContent = [
    ...beforeWireless,
    '',
    ...dedicatedSection,
    '',
    ...wirelessSection,
    '',
    ...afterDedicated.filter((line, idx) => {
        // Remove the old dedicated section from afterDedicated
        return idx >= (wirelessEnd - dedicatedEnd);
    })
].join('\n');

// Write back
fs.writeFileSync('c:/Users/ryano/Herd/tirtabhumi/resources/views/tirtanet.blade.php', newContent, 'utf8');
console.log('Done! Dedicated Internet now first, Wireless second.');
