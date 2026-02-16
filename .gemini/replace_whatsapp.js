
import { readFileSync, writeFileSync } from 'fs';

const filePath = 'c:\\Users\\ryano\\Herd\\tirtabhumi\\resources\\views\\tirtanet.blade.php';

try {
    const oldNumberRegex = /6282229046099/g;
    const newNumber = '628970238105';

    let content = readFileSync(filePath, 'utf8');

    // Safety check: count occerrences
    const matches = content.match(oldNumberRegex);

    if (!matches) {
        console.log('No occurrences found.');
    } else {
        console.log(`Found ${matches.length} occurrences.`);
        const newContent = content.replace(oldNumberRegex, newNumber);
        writeFileSync(filePath, newContent, 'utf8');
        console.log('Replacement complete.');
    }
} catch (err) {
    console.error('Error:', err);
}
