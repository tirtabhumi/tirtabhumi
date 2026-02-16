import fs from 'fs';
import { fileURLToPath } from 'url';
import { dirname } from 'path';

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
    if (wirelessStart !== -1 && wirelessEnd === -1 && lines[i].includes('</section>') && i > wirelessStart + 10) {
        // Find the closing tag for wireless section
        let depth = 0;
        for (let j = wirelessStart; j <= i; j++) {
            if (lines[j].includes('<section')) depth++;
            if (lines[j].includes('</section>')) depth--;
            if (depth === 0 && j > wirelessStart) {
                wirelessEnd = j;
                break;
            }
        }
    }
}

console.log('Dedicated:', dedicatedStart, '-', dedicatedEnd);
console.log('Wireless:', wirelessStart, '-', wirelessEnd);

// Extract sections
const beforeSections = lines.slice(0, dedicatedStart);
const dedicatedSection = lines.slice(dedicatedStart, dedicatedEnd + 1);
const wirelessSection = lines.slice(wirelessStart, wirelessEnd + 1);
const afterWireless = lines.slice(wirelessEnd + 1);

// Read registration flow
const regFlow = fs.readFileSync('c:/Users/ryano/Herd/tirtabhumi/.gemini/registration_flow_section.html', 'utf8');

// Reconstruct file: before + wireless + dedicated + regFlow + after
const newContent = [
    ...beforeSections,
    '',
    ...wirelessSection,
    '',
    ...dedicatedSection,
    '',
    regFlow,
    '',
    ...afterWireless
].join('\n');

// Write back
fs.writeFileSync('c:/Users/ryano/Herd/tirtabhumi/resources/views/tirtanet.blade.php', newContent, 'utf8');
console.log('Done! Sections swapped and registration flow added.');
