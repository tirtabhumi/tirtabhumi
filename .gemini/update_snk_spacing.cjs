const fs = require('fs');
const filePath = 'c:\\Users\\ryano\\Herd\\tirtabhumi\\resources\\views\\tirtanet.blade.php';

try {
    let content = fs.readFileSync(filePath, 'utf8');

    // 1. Reduce Min-Heights
    content = content.replace(/min-h-\[105px\]/g, 'min-h-[85px]');
    content = content.replace(/min-h-\[140px\]/g, 'min-h-[90px]');
    content = content.replace(/min-h-\[60px\]/g, 'min-h-[50px]');

    // 2. Replace Onclick Handler
    // Matches onclick="openModal('Keterangan Penting', [ ... ])" covering multi-line
    const onclickRegex = /onclick="openModal\('Keterangan Penting',\s*\[[\s\S]*?\]\)"/g;
    const clickCount = (content.match(onclickRegex) || []).length;
    console.log(`Found ${clickCount} onclick handlers to replace.`);
    content = content.replace(onclickRegex, 'onclick="openTermsModal()"');

    // 3. Inject New Function
    const funcInjectionMarker = 'function openModal(title, items) {';
    const newFunc = `
        function openTermsModal() {
            const terms = [
                'Harga yang tertera belum termasuk PPN 11%.',
                'Biaya bulanan bersifat tetap (FLAT) selama masa berlangganan.',
                'Pembayaran dilakukan setiap bulan (tanggal 1-20) melalui kanal resmi (Indomaret, Alfamart, BRILink, M-Banking, Virtual Account).',
                'Petugas lapangan tidak diperkenankan menerima pembayaran tunai.',
                'Perangkat Modem/ONT dipinjamkan cuma-cuma selama berlangganan.',
                'Masa minimum berlangganan adalah 12 bulan.',
                'Pemutusan layanan sebelum kontrak habis dapat dikenakan biaya administrasi.',
                'Proses instalasi normal 1-3 hari kerja sejak verifikasi data.'
            ];
            openModal('Syarat & Ketentuan Layanan', terms);
        }

        ${funcInjectionMarker}`;

    if (!content.includes('function openTermsModal')) {
        content = content.replace(funcInjectionMarker, newFunc);
        console.log('Injected openTermsModal function.');
    }

    fs.writeFileSync(filePath, content, 'utf8');
    console.log('Successfully updated tirtanet.blade.php');

} catch (err) {
    console.error(err);
}
