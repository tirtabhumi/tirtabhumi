import fs from 'fs';

const filePath = 'c:/Users/ryano/Herd/tirtabhumi/resources/views/tirtanet.blade.php';
let content = fs.readFileSync(filePath, 'utf8');

// 1. Remove gradient from EZNET heading
content = content.replace(
    '<span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600">Gunakan EZNET Wireless</span>',
    '<span class="text-cyan-600">Gunakan Wifi Wireless (Tanpa Kabel)</span>'
);

// 2. Change heading text
content = content.replace('Tidak Ada Kabel Fiber?', 'Tidak ada tiang ODP disekitarmu?');

// 3. Remove "Telkomsel" 
content = content.replace('menara BTS Telkomsel terdekat', 'menara BTS terdekat');

// 4. Remove FUP text for 10 Mbps
content = content.replace(
    '<div class="text-sm text-slate-500 mt-2">FUP 120 GB (Unlimited)</div>',
    '<div class="text-sm text-slate-400 font-medium">Perbulan</div>'
);

// 5. Remove FUP text for 15 Mbps  
content = content.replace(
    '<div class="text-sm text-slate-500 mt-2">FUP 200 GB (Unlimited)</div>',
    '<div class="text-sm text-slate-400 font-medium">Perbulan</div>'
);

// 6. Remove gradient from EZNET CTA buttons (10 Mbps)
content = content.replace(
    'class="block w-full py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-center rounded-xl transition-all shadow-lg shadow-blue-100">\n                        Pilih Paket Ini\n                    </a>\n                </div>\n\n                <!-- Paket 15 Mbps',
    'class="block w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-center rounded-xl transition-all shadow-lg shadow-blue-100">\n                        Pilih Paket Ini\n                    </a>\n                </div>\n\n                <!-- Paket 15 Mbps'
);

// 7. Remove gradient from EZNET CTA buttons (15 Mbps)
content = content.replace(
    'class="block w-full py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-center rounded-xl transition-all shadow-lg shadow-blue-100">\n                        Pilih Paket Ini\n                    </a>\n                </div>\n            </div>',
    'class="block w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-center rounded-xl transition-all shadow-lg shadow-blue-100">\n                        Pilih Paket Ini\n                    </a>\n                </div>\n            </div>'
);

// 8. Rename EZNET references
content = content.replace('Pelanggan EZNET Wireless akan', 'Pelanggan Wifi Wireless (Tanpa Kabel) akan');

// 9. Update WhatsApp links
content = content.replace(
    'text=Halo,%20saya%20berminat%20dengan%20EZNET%20Wireless%2010%20Mbps.',
    'text=Halo,%20saya%20berminat%20dengan%20Wifi%20Wireless%20(Tanpa%20Kabel)%2010%20Mbps.'
);
content = content.replace(
    'text=Halo,%20saya%20berminat%20dengan%20EZNET%20Wireless%2015%20Mbps.',
    'text=Halo,%20saya%20berminat%20dengan%20Wifi%20Wireless%20(Tanpa%20Kabel)%2015%20Mbps.'
);

// 10. Now swap Hero and Dedicated Internet sections
const lines = content.split('\n');

// Find Hero section boundaries
let heroStart = -1, heroEnd = -1;
for (let i = 0; i < lines.length; i++) {
    if (lines[i].includes('<!-- Hero Section -->')) {
        heroStart = i;
    }
    if (heroStart !== -1 && heroEnd === -1 && lines[i].includes('</section>') && i > heroStart + 5) {
        let depth = 0;
        for (let j = heroStart; j <= i; j++) {
            const sectionOpens = (lines[j].match(/<section/g) || []).length;
            const sectionCloses = (lines[j].match(/<\/section>/g) || []).length;
            depth += sectionOpens - sectionCloses;
        }
        if (depth === 0) {
            heroEnd = i;
            break;
        }
    }
}

// Find Dedicated section start
let dedicatedStart = -1;
for (let i = heroEnd + 1; i < lines.length; i++) {
    if (lines[i].includes('<!-- Dedicated Internet Section -->')) {
        dedicatedStart = i;
        break;
    }
}

// Find Dedicated section end
let dedicatedEnd = -1;
let depth2 = 0;
for (let i = dedicatedStart; i < lines.length; i++) {
    const sectionOpens = (lines[i].match(/<section/g) || []).length;
    const sectionCloses = (lines[i].match(/<\/section>/g) || []).length;
    depth2 += sectionOpens - sectionCloses;
    if (depth2 === 0 && i > dedicatedStart + 5) {
        dedicatedEnd = i;
        break;
    }
}

console.log('Hero:', heroStart, '-', heroEnd);
console.log('Dedicated:', dedicatedStart, '-', dedicatedEnd);

// Extract parts
const beforeHero = lines.slice(0, heroStart);
const heroSection = lines.slice(heroStart, heroEnd + 1);
const betweenHeroDedicated = lines.slice(heroEnd + 1, dedicatedStart);
const dedicatedSection = lines.slice(dedicatedStart, dedicatedEnd + 1);
const afterDedicated = lines.slice(dedicatedEnd + 1);

// Reconstruct: before + Dedicated + Hero + Alur Pendaftaran + rest
const regFlow = `
    <!-- Alur Pendaftaran Section -->
    <section id="registration-flow" class="relative py-24 bg-white overflow-hidden">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-[10%] right-[5%] w-[400px] h-[400px] bg-indigo-500/5 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-[10%] left-[5%] w-[400px] h-[400px] bg-cyan-500/5 rounded-full blur-[100px]"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-sm font-bold tracking-wide mb-4">MUDAH & CEPAT</span>
                <h2 class="text-3xl md:text-5xl font-bold text-slate-800 mb-6 leading-tight">Alur Pendaftaran</h2>
                <p class="text-slate-500 text-lg leading-relaxed max-w-2xl mx-auto">Proses pendaftaran yang simple dan transparan. Dari pemilihan paket hingga internet aktif hanya dalam hitungan hari.</p>
            </div>
            <div class="max-w-5xl mx-auto">
                <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">1</div>
                        <div class="absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-2rem)] h-0.5 bg-blue-500/30 hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-2">Pilih Paket</h3>
                        <p class="text-sm text-slate-500">Tentukan paket yang sesuai kebutuhan</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">2</div>
                        <div class="absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-2rem)] h-0.5 bg-blue-500/30 hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-2">Verifikasi</h3>
                        <p class="text-sm text-slate-500">Tim kami akan verifikasi data Anda</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">3</div>
                        <div class="absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-2rem)] h-0.5 bg-blue-500/30 hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-2">Tunggu 1-2 Hari</h3>
                        <p class="text-sm text-slate-500">Proses persiapan pemasangan</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">4</div>
                        <div class="absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-2rem)] h-0.5 bg-blue-500/30 hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-2">Pemasangan</h3>
                        <p class="text-sm text-slate-500">Router wifi dipasang oleh teknisi</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">5</div>
                        <div class="absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-2rem)] h-0.5 bg-blue-500/30 hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-2">Bayar</h3>
                        <p class="text-sm text-slate-500">Bayar biaya awal sesuai paket</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-green-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-green-500/30 group-hover:scale-110 transition-transform duration-300">✓</div>
                        <h3 class="font-bold text-slate-800 mb-2">Internet Aktif</h3>
                        <p class="text-sm text-slate-500">Nikmati koneksi internet Anda</p>
                    </div>
                </div>
                <div class="text-center mt-12">
                    <a href="https://wa.me/6282229046099?text=Halo,%20saya%20ingin%20mendaftar%20Tirtanet." class="inline-flex items-center gap-2 px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-all duration-300 shadow-lg shadow-blue-500/30">
                        <span>Mulai Pendaftaran</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>`;

const newContent = [
    ...beforeHero,
    ...dedicatedSection,
    '',
    ...heroSection,
    regFlow,
    '',
    ...afterDedicated
].join('\n');

fs.writeFileSync(filePath, newContent, 'utf8');
console.log('Done! Order: Dedicated -> Hero -> Alur Pendaftaran -> Wireless -> rest');
