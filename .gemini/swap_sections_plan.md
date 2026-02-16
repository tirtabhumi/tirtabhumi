# Plan: Swap Sections and Add Registration Flow

## Objective
1. Swap section order: Move Wifi Wireless section before Dedicated Internet section
2. Add new "Alur Pendaftaran" section with registration flow steps

## Current Structure (from line numbers observed)
- Line 173-499: Dedicated Internet Section (Section 1)
- Line 502-675: Wifi Wireless Section (Section 2)

## Target Structure
1. Wifi Wireless Section (currently Section 2) → becomes Section 1
2. Dedicated Internet Section (currently Section 1) → becomes Section 2  
3. New "Alur Pendaftaran" Section → add after Section 2

## Registration Flow Steps
1. Pilih Paket
2. Akan diverifikasi oleh kantor
3. Tunggu pemasangan 1-2 hari
4. Router wifi dipasang
5. Bayar biaya awal
6. Internet aktif

## Implementation Steps
1. Extract Wifi Wireless section content (lines 502-675)
2. Extract Dedicated Internet section content (lines 173-499)
3. Reorder: Place Wifi Wireless first, then Dedicated Internet
4. Create new Alur Pendaftaran section with timeline/steps design
5. Insert after Dedicated Internet section
