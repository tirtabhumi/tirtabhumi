const fs = require('fs');

const filePath = 'c:\\Users\\ryano\\Herd\\tirtabhumi\\resources\\views\\tirtanet.blade.php';

try {
    const content = fs.readFileSync(filePath, 'utf8');
    const oldNumberRegex = /6282229046099/g;
    const newNumber = '628970238105';

    const matches = content.match(oldNumberRegex);
    if (matches) {
        console.log(`Found ${matches.length} occurrences to replace.`);
        const newContent = content.replace(oldNumberRegex, newNumber);
        fs.writeFileSync(filePath, newContent, 'utf8');
        console.log('Successfully replaced all occurrences.');
    } else {
        console.log('No occurrences found.');
    }
} catch (err) {
    console.error('Error:', err);
}
