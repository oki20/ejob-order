-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2024 pada 07.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `image` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `bagian` varchar(16) NOT NULL,
  `jabatan` varchar(8) NOT NULL,
  `plant` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `name`, `nim`, `image`, `password`, `no_hp`, `bagian`, `jabatan`, `plant`, `email`, `role_id`) VALUES
(1, 'Sardiko', '81-2019', 'default.jpg', '$2y$10$N.5t5Kr9qdb3VmIVr5ouA.wzuTp5lE/AXx1ZtBCzIcSdIH4btPO26', '+6289663456032', 'Elektrik', 'L', '4,8', 'sardiko@gmail.com', 8),
(2, 'Arief', '17-0736', 'default.jpg', '$2y$10$Mncu4QWdRH1A1AX20nNCmuJJcJake4mUjeWzhqwtfCeAS0O1gHmvy', '+6289663456037', 'Elektrik', 'L', '9,10', 'arief@gmail.com', 8),
(5, 'Andy Wahyu K', '12-3456', 'default.jpg', '$2y$10$ix3atJF0viG2CzHBFC4jr.5k0xmaaIUTDdDukjhF6acT5FRK7dHci', '', 'Elektrik', 'ADH', '4,8,9', 'andy@gmail.com', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_plant`
--

CREATE TABLE `member_plant` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(128) NOT NULL,
  `nim_member` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `member_plant`
--

INSERT INTO `member_plant` (`id`, `id_member`, `nama_member`, `nim_member`) VALUES
(1, 2, 'Wasono Catur', '16-0092'),
(2, 4, 'Ade Arhan', '20-2019'),
(3, 2, 'Habiburahman', '16-1939');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_job_order`
--

CREATE TABLE `pengajuan_job_order` (
  `id` int(11) NOT NULL,
  `no_jo` varchar(40) NOT NULL,
  `tgl_jo` date NOT NULL,
  `cc_no` varchar(50) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `tujuan` text NOT NULL,
  `pelaksana` varchar(50) NOT NULL,
  `rencana` text NOT NULL,
  `cep_no` varchar(10) NOT NULL,
  `lampiran` varchar(6) NOT NULL,
  `dwg_no` varchar(10) NOT NULL,
  `mesin_no` varchar(30) NOT NULL,
  `id_plant` varchar(11) NOT NULL,
  `id_pemesan` varchar(64) NOT NULL,
  `id_depthead` int(11) NOT NULL,
  `id_planthead` int(11) NOT NULL,
  `id_factoryhead` int(11) NOT NULL,
  `id_eng_depthead` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `tgl_terima` date NOT NULL,
  `status` varchar(6) NOT NULL,
  `no_file` varchar(16) NOT NULL,
  `klasifikasi` varchar(8) NOT NULL,
  `golongan` varchar(8) NOT NULL,
  `departemen_lain` varchar(16) NOT NULL,
  `saran_dept` varchar(256) NOT NULL,
  `saran_plant` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan_job_order`
--

INSERT INTO `pengajuan_job_order` (`id`, `no_jo`, `tgl_jo`, `cc_no`, `pekerjaan`, `tujuan`, `pelaksana`, `rencana`, `cep_no`, `lampiran`, `dwg_no`, `mesin_no`, `id_plant`, `id_pemesan`, `id_depthead`, `id_planthead`, `id_factoryhead`, `id_eng_depthead`, `id_penerima`, `tgl_terima`, `status`, `no_file`, `klasifikasi`, `golongan`, `departemen_lain`, `saran_dept`, `saran_plant`) VALUES
(16, 'ACL/002/002/21', '0000-00-00', 'ACL', 'Mohon untuk di modifikasi conveyor transfer OM Breakdown ke OM Feeding ( ACL-1 ) M&R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'M.ROCHIM', 0, 0, 0, 0, 0, '2021-03-06', '5', 'J-5489', 'MD', 'B', '-', '', ''),
(17, 'EFE/008/IX/23', '0000-00-00', 'EFE', 'Mohon di modifikasi cutter open mill Plant-E menggunakan sistem Pneumatic.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '5', 'KARSITA', 0, 0, 0, 0, 0, '2023-09-26', '5', 'J-6996', 'MD', 'A', '-', '', ''),
(18, '01/ERM/X/23', '0000-00-00', 'ERM', 'Perbaikan lantai (tiga tiang penyangga) TPS Plant-E.', '-', 'Mekanik', '-', '-', '-', '-', '-', '5', 'BENI H.', 0, 0, 0, 0, 0, '2023-11-02', '5', 'J-7063', 'DLL', 'A', '-', '', ''),
(19, 'GTL/02/11/23', '0000-00-00', 'GTL', 'Perbaikan instalasi listrik di Exs. Kantor Mixing Plant-E untuk ruang Training.', '-', 'Elektrik', '-', '-', '-', '-', '-', '5', 'DAWUD D', 0, 0, 0, 0, 0, '2023-12-05', '5', 'J-7161', 'DLL', 'A', '-', '', ''),
(20, 'GTL/03/11/23', '0000-00-00', 'GTL', 'Pembongkaran instalasi Exs. Water Cooler di lantai 2 Exs. Kantor mixing Plant-E.', '-', 'Elektrik', '-', '-', '-', '-', '-', '5', 'DAWUD D', 0, 0, 0, 0, 0, '2023-12-05', '5', 'J-7162', 'DLL', 'A', '-', '', ''),
(21, 'ACL/005/006/21', '0000-00-00', 'ACL', 'Mohon di alih fungsikan open mill Intermediate menjadi open mill feeding (contingency) ACL-2.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'WISNU S.', 0, 0, 0, 0, 0, '2021-07-01', '5', 'J-5607', 'MD', 'B', '-', '', ''),
(22, 'ASQ/001/01/23', '0000-00-00', 'ASQ', 'Mohon di pasangkan modifikasi outlet compound mesin OM-2 ASQ-1. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'KARSONO', 0, 0, 0, 0, 0, '2023-01-27', '5', 'J-6517', 'MD', 'B', '-', '', ''),
(23, 'ATC/05/02/23', '0000-00-00', 'ATC', 'Modifikasi PCI (lebar bead to bead) mesin ATC-C01 BOM 42P. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'JAYADI', 0, 0, 0, 0, 0, '2023-03-09', '5', 'J-6600', 'MD', 'B', '-', '', ''),
(24, '98800/073/04/23', '0000-00-00', 'JLAB', 'Mohon bantuannya untuk di lakukan pekerjaan penggantian tangga ruang dimensi perubahan posisi dan penggantian pintu ruang dimensi peninggian plafon ruang dimensi dan pembuatan pagar untuk mesin ABP-2  CEP :  64100019022011BA.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'ENTIS S.', 0, 0, 0, 0, 0, '2023-04-14', '5', 'J-6664', 'MD', 'C', 'Civil Work', '', ''),
(25, '98800/083/05/23', '0000-00-00', 'ATE', 'Mohon bantuannya untuk melakukan pekerjaan pemasangan mesin CFE Extruder Ex. RSW-1 di area ATE-2 ( dekat tiang D-21 dan 22 ) sebanyak 1 unit beserta infrastrukturnya baik elektrik maupun mekanik. CEP : M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ENTIS S.', 0, 0, 0, 0, 0, '2023-06-05', '5', 'J-6748', 'INM', 'C', 'Civil Work', '', ''),
(26, '98800/089/05/23', '0000-00-00', 'ATB', 'Mohon di lakukan pekerjaan : Pemasangan 1 set mesin Building Ex.Samson di Plant-A beserta Assesoriesnya ( mekanik dan elektrik ). CEP : 140600100122001NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ENTIS S.', 0, 0, 0, 0, 0, '2023-06-16', '5', 'J-6768', 'MD', 'B', 'Civil Work', '', ''),
(27, '98800/087/05/23', '0000-00-00', 'ATB', 'Mohon di lakukan pekerjaan : Pemasangan 1 set mesin Band Building Ex.Samson di Plant-A beserta Assesoriesnya ( mekanik dan elektrik ). CEP : 140600100122004NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ENTIS S.', 0, 0, 0, 0, 0, '2023-06-16', '5', 'J-6769', 'MD', 'B', 'Civil Work', '', ''),
(28, '98800/104/06/23', '0000-00-00', 'JLAB', 'Mohon bantuannya untuk di lakukan pemasangan New Drum Test ADT-1 lengkap dengan Infrastrukturnya baik mekanik maupun elektrik. CEP : 64100019022004BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ENTIS S.', 0, 0, 0, 0, 0, '2023-06-28', '5', 'J-6786', 'INM', 'B', 'Civil Work', '', ''),
(29, '98800/100/06/23', '0000-00-00', 'ATB', 'Mohon bantuannya untuk di lakukan pekerjaan Supervisi/pengawasan modifikasi BB OTR 3. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ENTIS S.', 0, 0, 0, 0, 0, '2023-07-05', '5', 'J-6794', 'MD', 'B', '-', '', ''),
(30, '030/JO/GAD/VI/23', '0000-00-00', 'GAD', 'Penggantian lantai bak dengan bahan plat bordes dan pemasangan list bak untuk mobil Truck B 9386 QN.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'ANTON S.', 0, 0, 0, 0, 0, '2023-07-05', '5', 'J-6796', 'MD', 'B', 'Workshop', '', ''),
(31, 'JWS/007/VI/23', '0000-00-00', 'JWS', 'Mohon di modifikasi dan di pindahkan Hoist workshop 1 dengan rincian sbb :  -. Penambahan rell Grider dan End Truck Grider include power supply    -. Penggantian tiang Hoist menggunakan tiang Ex. Tiang Hoist TBR.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ACH. DWI', 0, 0, 0, 0, 0, '2023-07-05', '5', 'J-6798', 'MD', 'B', 'Civil Work', '', ''),
(32, '98800/095/06/23', '0000-00-00', 'ABG', 'Mohon di lakukan pekerjaan pemasangan 1 set new mesin Trouring di Plant-A.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ENTIS S.', 0, 0, 0, 0, 0, '2023-07-05', '5', 'J-6799', 'INM', 'C', '-', '', ''),
(33, '034/IEM/VII/23', '0000-00-00', 'IEM', 'Pembuatan dan pemasangan atap green house ( Ex. Kandang merak ).', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'TAUFIQ', 0, 0, 0, 0, 0, '2023-08-09', '5', 'J-6885', 'DLL', 'C', 'Civil Work dan W', '', ''),
(34, '152/JMW/VIII/23', '0000-00-00', 'JMW', 'Mohon untuk meng up grade teknologi bandul pada Topsol dan Exxol Plant-A. Note : Saat ini bandul menggunakan sistem pelampung manual.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ARON G.', 0, 0, 0, 0, 0, '2023-08-18', '5', 'J-6914', 'DLL', 'A', '-', '', ''),
(35, 'JLB/055/VII/23', '0000-00-00', 'JLB', 'Pemasangan mesin Tire Changer TB di ruang dimensi Laboratorium A. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ANRI', 0, 0, 0, 0, 0, '2023-08-25', '5', 'J-6925', 'MT', 'B', '-', '', ''),
(36, 'GDP/JO38/MIS/ITF/IX/23', '0000-00-00', 'GDP', 'Pemasangan try jalur kabel dan perapihan di area saluran air depan koperasi dan klinik GT.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'EDY SUJIWO', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6953', 'DLL', 'A', '-', '', ''),
(37, '380100/128/VIII/23', '0000-00-00', 'GSR', 'Perbaikan gerbang tandon, rusak karena remote tidak berfungsi.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'EKAN J', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6954', 'DLL', 'B', '-', '', ''),
(38, 'ASQ/001/08/23', '0000-00-00', 'ASQ', 'Mohon di pasangkan modifikasi Adjuster bank compound untuk mesin Asq-1. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'KARSONO', 0, 0, 0, 0, 0, '2023-05-11', '5', 'J-6955', 'MD', 'A', '-', '', ''),
(39, 'JLB/060/IX/23', '0000-00-00', 'JLB', 'Pembuatan dan penginstallan listrik pada mesin Bead Cutting baru laborat Plant-A, jumlah spare part tambahan : Cutter set = 6 pcs, Steel die = 6 pcs. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'EJA AM', 0, 0, 0, 0, 0, '2023-09-18', '5', 'J-6978', 'INM', 'A', '-', '', ''),
(40, 'JLB/060/IX/23', '0000-00-00', 'JLB', 'Pembuatan dan penginstalan listrik pada mesin Bead Cutting baru laborat Plant-A, jumlah sparepart tambahan : -. Cutter set = 6 pcs, -. Steel die = 6 pcs. CEP : 54100019023013BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'FAISAL BA', 0, 0, 0, 0, 0, '2023-09-26', '5', 'J-6994', 'SP', 'A', '-', '', ''),
(41, 'JWS/006/IX/23', '0000-00-00', 'JWS', 'Mohon di buatkan Grounding kabel pada area Workshop 2 (Ex.TBR).', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ACH DWI', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7001', 'HSE', 'B', '-', '', ''),
(42, '192/JMW/IX/23', '0000-00-00', 'JMW', 'Pemasangan 3 bh lampu LED di area man road samping TPS B3 menyorot ke arah gudang ARM 1 pintu 10. Note : -. Lampu menggunakan lampu LED Highbay outdoor ip 65-up  -. Jarak antar lampu ? 6 meter.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ARON G', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7016', 'HSE', 'B', '-', '', ''),
(43, 'ATC/01/06/23', '0000-00-00', 'ATC', 'Pembuatan dan pemasangan sandaran mold sebanyak 2 set untuk pemasangan di area mesin ATC-CN1 dan Prepared mold. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'JAYADI', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7019', 'DLL', 'A', '-', '', ''),
(44, 'JBW/021/01/23', '0000-00-00', 'JBW', 'Mohon untuk di buatkan kanopi di samping gudang sparepart Plant-A.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'CATUR', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7021', 'DLL', 'B', 'Civil Work dan W', '', ''),
(45, '98800/186/10/23', '0000-00-00', 'ABG', 'Mohon bantuannya untuk di lakukan pemasangan wind up mesin ABG-6 beserta ifrastrukturnya baik mekanik maupun elektriknya. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ENTIS S', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7040', 'MD', 'B', '-', '', ''),
(46, '044/IEM/X/23', '0000-00-00', 'IEM', 'Pemasangan 2 unit Hydrant pilar di area Outdoor GTMO.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'TAUFIQ', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7049', 'DLL', 'B', '-', '', ''),
(47, 'JLB/076/XI/23', '0000-00-00', 'JLB', 'Pembuatan sumber stop kontak listrik 1 fase ( 4 titik ) di laborat Plant-A. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'FAISAL', 0, 0, 0, 0, 0, '2023-11-16', '5', 'J-7102', 'DLL', 'A', '-', '', ''),
(48, 'JBW/191/11/23', '0000-00-00', 'JBW', 'Mohon di bantu untuk pemasangan play Yzer rak motor, Gudang sparepart Plant-A ( ABW 1 ).', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'SOPRIYATNO', 0, 0, 0, 0, 0, '2023-11-16', '5', 'J-7103', 'DLL', 'A', 'Civil Work', '', ''),
(49, 'ATB/001/X/23', '0000-00-00', 'ATB', 'Mohon di buatkan : 1. Pagar untuk area mesin baru Building dan Band Building. M&R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'RAYMON', 0, 0, 0, 0, 0, '2023-11-22', '5', 'J-7121', 'HSE', 'A', '-', '', ''),
(50, 'JLB/078/XI/23', '0000-00-00', 'JLB', 'Penambahan safety curing TYC-10.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'AZIZ W', 0, 0, 0, 0, 0, '2023-12-05', '5', 'J-7159', 'HSE', 'B', '-', '', ''),
(51, '227/JMW/X/23', '0000-00-00', 'JMW', 'Mohon untuk di perbaiki engsel pintu padar yang rusak, lokasi tangki exxol/topsol ARM-2.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'RENALDO', 0, 0, 0, 0, 0, '2023-12-06', '5', 'J-7163', 'DLL', 'A', 'Civil Work', '', ''),
(52, '267/JMW/XII/23', '0000-00-00', 'JMW', 'Penggantian lampu penerangan LED area Gudang ARM 1 pintu 10 sebanyak 9 titik dan penambahan sebanyak 6 titik.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'APRIAL', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7165', 'SP', 'A', '-', '', ''),
(53, '254/JMW/XI/23', '0000-00-00', 'JMW', 'Pemasangan lampu penerangan pada area parkir motor belakang parkir mobil damkar sebanyak 4 titik.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'APRIAL', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7173', 'HSE', 'B', '-', '', ''),
(54, '266/JMW/XII/23', '0000-00-00', 'JMW', 'Pemasangan lampu TL sebanyak 3 titik di Gudang ARM 1 pintu 10.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'APRIAL', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7174', 'HSE', 'A', '-', '', ''),
(55, '076/PE-A/XII/21', '0000-00-00', 'AMP', 'Mohon di renovasi ruang leader dan ruang meeting Maintenance-A (kelistrikan).', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'RONNY N', 0, 0, 0, 0, 0, '2022-04-06', '5', 'J-5997', 'SPC', 'C', 'Civil Work', '', ''),
(56, 'AFI-23/X/006', '0000-00-00', 'AFI', 'Pembongkaran tembok dan plafond dekat tiang A74 dan pemasangan tembok, jaring pembatas dan lampu penerangan dekat tiang A77. Note : Area Ex. Gudang R & D. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'AGIL', 0, 0, 0, 0, 0, '2023-11-02', '5', 'J-7065', 'DLL', 'A', 'Civil Work', '', ''),
(57, 'ATC/02/12/22', '0000-00-00', 'ATC', 'Pembuatan dan pemasangan Adjuster conveyor line E-F. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'JAYADI', 0, 0, 0, 0, 0, '2022-05-31', '5', 'J-6062', 'SPC', 'C', 'Workshop', '', ''),
(58, 'ACL/01/02/22', '0000-00-00', 'ACL', 'Mohon untuk di lakukan modifikasi conveyor ACL-1 OM-1 ke OM-3 (Ex.ACL-2). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'KARSONO', 0, 0, 0, 0, 0, '2022-06-08', '5', 'J-6072', 'MD', 'C', 'Workshop', '', ''),
(59, 'BBG/90/XI/21', '0000-00-00', 'BBG', 'Mohon di pasangkan plastik Alumunium untuk penutup atas Dust Collector (samping mesin BBG SL01) Note : Paparan tale mengenai mesin BBG.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'NUGRO', 0, 0, 0, 0, 0, '2021-12-06', '5', 'J-5791', 'QN', 'A', 'Civil Work', '', ''),
(60, 'JCM/01/09/22', '0000-00-00', 'JCM', 'Tolong di buatkan water oil sparator di area taman JCM pool Forklif dan pendangkalan saluran air di dalam area JCM pool Forklif.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'SURUNGAN', 0, 0, 0, 0, 0, '2022-09-14', '5', 'J-6257', 'HSE', 'B', 'Civil Work', '', ''),
(61, 'BPW/02/I/23', '0000-00-00', 'BPW', 'Mohon agar di lakukan pembongkaran Lift barang 1st floor dan 2nd floor yang sudah tidak di gunakan/di fungsikan di Gudang Ban BPW 1.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-01-16', '5', 'J-6485', 'DLL', 'A', 'Civil Work', '', ''),
(62, '05/GPR/024/01/23', '0000-00-00', 'GPR', 'Mohon bantuannya di buatkan catwalk di area lapangan Futsal. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'ARIEF W', 0, 0, 0, 0, 0, '2023-02-03', '5', 'J-6531', 'HSE', 'C', '-', '', ''),
(63, 'BPW/08/I/23', '0000-00-00', 'BPW', 'Mohon di buatkan dan di pasangkan rell pintu 1,2,3,4 gudang ban APW-3.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-02-03', '5', 'J-6532', 'HSE', 'A', 'Civil Work', '', ''),
(64, 'JBW/059/03/23', '0000-00-00', 'JBW', 'Mohon di buatkan : 1. Pembuatan pondasi tiang hoist (termasuk stratusspile baut angkur & grouting) 2. Pembuatan dan pemasangan konstruksi frame Hoist (mekanik dan elektrik). Note : Untuk gudang spare part Plant-B (ABW 3)  -. Electrik Chain Hoist sudah ada', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'DONNA', 0, 0, 0, 0, 0, '2023-04-04', '5', 'J-6643', 'SPC', 'B', 'Civil Work', '', ''),
(65, 'BPW/01/IV/23', '0000-00-00', 'BPW', 'Mohon di buatkan hambalan truck sebanyak 100 Bh di gudang Ban B APW 1 & BPW 1, Bahan : Kanal UNP 120, L : 4cm. APW 1 : 40 Bh, BPW 1 : 60 Bh.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-05-12', '5', 'J-6705', 'HSE', 'B', 'Workshop', '', ''),
(66, 'JCM/01/05/23', '0000-00-00', 'JCM', 'Tolong di buatkan dan di pasangkan tutup selokan air dan tempat separator oli di area samping JCM pool Forklif.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'SURUNGAN', 0, 0, 0, 0, 0, '2023-06-05', '5', 'J-6757', 'HSE', 'A', 'Civil Work', '', ''),
(68, 'BTD/061/LV/VII/23', '0000-00-00', 'BTD', 'Mohon di lakukan pemasangan double tread Heater di mesin Building BTU untuk 2 unit.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'MABRURI', 0, 0, 0, 0, 0, '2023-07-31', '5', 'J-6854', 'SP', 'A', '-', '', ''),
(69, '027/IEM/VI/23', '0000-00-00', 'IEM', 'Pembuatan 1 patung Gajah.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'TAUFIQ H', 0, 0, 0, 0, 0, '2023-08-09', '5', 'J-6887', 'DLL', 'C', '-', '', ''),
(71, 'BPW/06/VIII/23', '0000-00-00', 'BPW', 'Mohon di lakukan pemindahan dan perbaikan mesin press No.PB 03 dari Gudang Ban B APW3 ke penerimaan produksi Plant-B.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-08-18', '5', 'J-6904', 'MD', 'C', '-', '', ''),
(72, 'BPW/04/VIII/23', '0000-00-00', 'BPW', 'Mohon di lakukan pemindahan dan perbaikan mesin press No.PB 01 dari Gudang Ban B APW3 ke penerimaan produksi Plant-B.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-08-18', '5', 'J-6905', 'MD', 'C', '-', '', ''),
(73, 'BFS/159/IX/22', '0000-00-00', 'BFS', 'Mohon di buatkan sesuai gambar terlampir lokasi area makan di Plant-B sebanyak 2 titik.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'JOENAIDY G', 0, 0, 0, 0, 0, '2023-09-04', '5', 'J-6944', 'DLL', 'B', '-', '', ''),
(74, '641100-23/VIII/013', '0000-00-00', 'BFI', 'Mohon di pindahkan meja check SDM ke Second check area FI Tire Plant-B.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'M HAMID', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6947', 'SP', 'A', '-', '', ''),
(75, 'BPW/09/VIII/23', '0000-00-00', 'BPW', 'Mohon di perbaiki box hydrant yang sudah keropos/berkarat di tiang F50 area 2nd floor Gudang Ban  BPW-1.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6967', 'HSE', 'A', '-', '', ''),
(76, 'BPW/01/VII/23', '0000-00-00', 'BPW', 'Mohon di buatkan dan di pasangkan pagar & pintu wiremesh di area penerimaan produksi Plant-B.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-09-20', '5', 'J-6987', 'DLL', 'B', '-', '', ''),
(77, 'JBW/151/09/23', '0000-00-00', 'JBW', 'Mohon di bantu pemasangan lampu sirine di Emergency gudang spare part Plant-B', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'DEDE A', 0, 0, 0, 0, 0, '2023-09-26', '5', 'J-6990', 'DLL', 'A', '-', '', ''),
(78, 'JBW/152/09/23', '0000-00-00', 'JBW', 'Mohon di bantu pemasangan Inner cover kabel di gudang spare part Plant-B.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'DEDE A', 0, 0, 0, 0, 0, '2023-09-26', '5', 'J-6991', 'DLL', 'A', '-', '', ''),
(79, 'BPW/02/IX/23', '0000-00-00', 'BPW', 'Mohon di pasangkan Mirror Convex di Gudang Ban B BPW 1 sebanyak 6 buah.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7010', 'HSE', 'B', 'Civil Work', '', ''),
(80, 'BPW/01/IX/23', '0000-00-00', 'BPW', 'Mohon di pasang mirror convex di gudang Ban B APW 1 dan APW 3, sebanyak 10 bh Note : APW 1 : 1 Bh, APW 3 : 9 Bh.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7014', 'HSE', 'A', 'Civil Work', '', ''),
(81, 'BPP/04/IX/23', '0000-00-00', 'BPP', 'Mohon untuk di pasangkan dan di orderkan : Stand, Box panel dan kabel power untuk Barcode Plant-BH. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'H DEDI', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7018', 'SP', 'A', '-', '', ''),
(82, 'BPW/03/VI/23', '0000-00-00', 'BPW', 'Mohon di modifikasi plat press roll tyre mesin Gudang Ban APW 3 sebanyak 4 unit. Tujuan : Untuk mempermudah proses pressing tire no wrapping.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7020', 'MD', 'A', '-', '', ''),
(83, 'BMC/222/X/23', '0000-00-00', 'BMC', 'Mohon di order dan di pasang Blower 24 sebanyak 1 unit untuk menghisap/membuang paparan udara hasil charge accu linde Building BMC. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'SIDIK P', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7043', 'HSE', 'A', 'Civil Work', '', ''),
(84, 'BTC/245/X/23', '0000-00-00', 'BTC', 'Mohon di lakukan : Pemindahan mesin Venting BTC ( VT 03, 04, 05, 06 ) ke area yang baru.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'SETYO W', 0, 0, 0, 0, 0, '2023-11-08', '5', 'J-7088', 'MD', 'B', 'Civil Work', '', ''),
(85, 'BXS/260/XI/23', '0000-00-00', 'BXS', 'Mohon untuk di pisahkan saklar MCB lampu penerangan splicing tube ( BXS ) dengan lampu penerangan BBG.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'KURDI', 0, 0, 0, 0, 0, '2023-11-16', '5', 'J-7108', 'DLL', 'A', '-', '', ''),
(86, 'BTE/256/X/23', '0000-00-00', 'BTE', 'Mohon di lakukan : Pemasangan 2 pcs Fire Block, Penambahan panel Grounding. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'BUDY A', 0, 0, 0, 0, 0, '2023-11-16', '5', 'J-7118', 'HSE', 'A', '-', '', ''),
(87, '641100-23/X/015', '0000-00-00', 'BFI', 'Mohon di orderkan dan di pasangkan lampu penerangan pada tiang B35, B36, B37 di area FI Tire Plant-B.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'M HAMID', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7123', 'SP', 'A', '-', '', ''),
(88, 'BTC/272/XI/23', '0000-00-00', 'BTC', 'Mohon di tambahkan lampu mercury di area Curing Tire BTC : Line 04 : 04.03/04.06/04.10/04.14 Line 05 : Tiang B29/B27/B25/B23, Line 06 : 06.01/06.05/06.10/06.14/06.18 Untuk penerangan pada saat Produksi.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'SETYO W', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7124', 'SP', 'B', '-', '', ''),
(89, 'BMC/278/XI/23', '0000-00-00', 'BMC', 'Mohon di tambahkan lampu mercury di area Building Tire BMC : Tiang  A13/A15/A17/A19/A21 B13/B15/B17/B19/B21/C17/C19/C21. Untuk penerangan pada saat Produksi.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'PANGIRING', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7125', 'SP', 'B', '-', '', ''),
(90, 'JBW/198/11/23', '0000-00-00', 'JBW', 'Mohon di bantu pemasangan lampu sirine di pintu Emergency di gudang sparepart Plant-B (ABW3).', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'DEDE', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7129', 'HSE', 'A', '-', '', ''),
(91, 'BTC/273/XI/23', '0000-00-00', 'BTC', 'Mohon di tambah lampu mercury di area curing tire BTC= Line 01 : 01 OP 04/01.17/01.21/01.11/01.08/01.04/01 OP 01/.  Line 02 : 02.01/02.15/02 OP 03/02.19/02.23/.  Line 03 : 03.02/03.06/03.10/03.14. Untuk penerangan pada saat Produksi.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'SETYO W', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7132', 'QN', 'B', '-', '', ''),
(92, 'BPW/06/XI/23', '0000-00-00', 'BPW', 'Mohon dapat di orderkan dan di pasangkan 12 lampu high bay di gudang ban B APW 3.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7134', 'DLL', 'B', '-', '', ''),
(93, 'BTE/282/XI/23', '0000-00-00', 'BTE', 'Mohon di pasangkan : Lampu penerangan (area Tread Extruder BTE) area mesin BTE Qty: 9 pcs Noting : B3,B4,B5,B6,B7,B8,B9,B10,B11.  M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'BUDY A', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7146', 'SP', 'B', '-', '', ''),
(94, 'BTE/281/XI/23', '0000-00-00', 'BTE', 'Mohon di buatkan -. Jalur kabel (untuk panel scane Barcode) mesin BBC 03 : 1 pcs. Untuk Operator ( Safety ).', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'BUDY A', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7147', 'HSE', 'A', '-', '', ''),
(95, '98800/207/11/23', '0000-00-00', 'BTE', 'Mohon di lakukan pekerjaan sbb : -. Pembongkaran Extruder BTE 5 dan Open Mill BTE 4 OM 2 dan BTE 5 OM1.  -. Pemasangan Extruder dan Take Off conveyor Ex. ITE 04.01 Beserta Assesoriesnya ( Mek & Elek ). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'SUPRIYADI', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7149', 'QN', 'B', 'Civil Work', '', ''),
(96, '98800/219/11/23', '0000-00-00', 'BMC', 'Mohon di lakukan pemasangan mesin Ex. IMC sebanyak 4 unit ( Ex.IMC 10.01, 10.02, 08.07 & 08.08 ) di BMC line 04. Mekanik, Elektrik dan infrastruktur beserta assesoriesnya. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'SUPRIYADI', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7179', 'INM', 'C', 'Civil Work', '', ''),
(97, '98800/218/11/23', '0000-00-00', 'BMC', 'Mohon di lakukan modifikasi Hanging line BMC 04.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'SUPRIYADI', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7180', 'MD', 'B', 'Workshop', '', ''),
(98, 'BBG/026/II/22', '0000-00-00', 'BBG', 'Mohon di pasangkan : -. Tirai PVC cuptain area dinding pembatas ABG dan Dust Collector Estimasi kebutuhan tirai : 3 Roll (paparan talck mengenai wire dll).', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'NUGRO P', 0, 0, 0, 0, 0, '2022-03-02', '5', 'J-5926', 'HSE', 'B', 'Civil Work', '', ''),
(99, '06/PGT/TGR/IV/22', '0000-00-00', 'PGT', 'Pembuatan ruang studio ( Elektrik ).', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'AMIN K', 0, 0, 0, 0, 0, '2022-09-14', '5', 'J-6254', 'DLL', 'C', 'Civil Work', '', ''),
(100, 'BFS/223/X/23', '0000-00-00', 'BFS', 'Mohon di buatkan, di orderkan dan di pasangkan :  1. Tembok pembatas antara storage compound dengan Flemmabel liquid di (SBP-XX) di bawah kantor Office Plant-B.  2. Exhaust fan sebanyak 2 unit. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'ARIF C', 0, 0, 0, 0, 0, '2023-11-14', '5', 'J-7101', 'HSE', 'A', 'Civil Work', '', ''),
(101, 'CXE/13/III/19', '0000-00-00', 'CXE', 'Mohon di pindahkan dan di pasangkan conveyor Extruder dari Blower sampai Booking Line 2 ke Line-1.  Note : Line 2 khusus untuk produksi Bladder. CEP : M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDDIN', 0, 0, 0, 0, 0, '2019-04-09', '5', 'J-4914', 'MD', 'C', '-', '', ''),
(102, '98800/089/4/22', '0000-00-00', 'CBM', 'Mohon di lakukan pek. Sbb : Pemasangan 1 set mesin Banbury mixer CBM-1 Plant - C ( Include Mixer, open mill, Batch off dan assesories ) beserta pekerjaan mekanik, elektrik, piping dan assesoriesnya. CEP : 51020110322001NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'ENTIS S', 0, 0, 0, 0, 0, '2022-04-22', '5', 'J-6028', 'INM', 'C', 'Civil Work', '', ''),
(103, 'CXE/63/XI/22', '0000-00-00', 'CXE', 'Mohon bantuannya untuk modifikasi guide open mill 4 line 2, CXE ( spare part sudah tersedia ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDDIN', 0, 0, 0, 0, 0, '2022-12-12', '5', 'J-6433', 'MD', 'B', '-', '', ''),
(104, 'CXE/62/XI/22', '0000-00-00', 'CXE', 'Mohon bantuannya untuk modifikasi guide open mill 3 CXE-1 ( spare part sudah tersedia ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDDIN', 0, 0, 0, 0, 0, '2022-12-12', '5', 'J-6434', 'MD', 'B', '-', '', ''),
(105, 'CXE/61/XI/22', '0000-00-00', 'CXE', 'Mohon bantuannya untuk modifikasi guide open mill 4 CXE-1 ( spare part sudah tersedia ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDDIN', 0, 0, 0, 0, 0, '2022-12-12', '5', 'J-6435', 'MD', 'B', '-', '', ''),
(106, 'CXE/66/XII/22', '0000-00-00', 'CXE', 'Mohon bantuannya untuk pemasangan side guide u/ Open Mill 2 CXE-1 (spare part sudah tersedia).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDDIN', 0, 0, 0, 0, 0, '2022-12-29', '5', 'J-6456', 'SPC', 'B', '-', '', ''),
(107, 'CXE/67/XII/22', '0000-00-00', 'CXE', 'Mohon bantuannya untuk pemasangan side guide u/ Open Mill 1 CXE-2 (spare part sudah tersedia).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDDIN', 0, 0, 0, 0, 0, '2022-12-29', '5', 'J-6458', 'SPC', 'B', '-', '', ''),
(108, 'CXE/65/XII/22', '0000-00-00', 'CXE', 'Mohon bantuannya untuk pemasangan side guide u/ Open Mill 1 CXE-1 (spare part sudah tersedia).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDDIN', 0, 0, 0, 0, 0, '2022-12-29', '5', 'J-6459', 'SPC', 'B', '-', '', ''),
(109, '98800/031/02/23', '0000-00-00', 'CBM', 'Mohon bantuannya untuk di lakukan pekerjaan pemasangan trafo dan panel cubicle serta pengadaan  dan pemindahan panel penerangan. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '3', 'ENTIS S', 0, 0, 0, 0, 0, '2023-02-23', '5', 'J-6563', 'SPC', 'B', '-', '', ''),
(111, 'CXC/17/IV/23', '0000-00-00', 'CXC', 'Mohon bantuannya untuk perbaikan lantai plat/bordes depan area repair di samping line C dan line D  CXC Plant-C.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'ADE', 0, 0, 0, 0, 0, '2023-06-12', '5', 'J-6702', 'HSE', 'A', '-', '', ''),
(112, 'CBL/18/IV/23', '0000-00-00', 'CBL', 'Mohon bantuannya untuk perbaikan lantai plat/bordes depan mesin CBL-1 dan CBL-5 Plant-C.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'ADE T', 0, 0, 0, 0, 0, '2023-05-12', '5', 'J-6706', 'HSE', 'A', '-', '', ''),
(113, 'CFH/23/V/23', '0000-00-00', 'CFH', 'Mohon bantuannya untuk pemasangan blower di area Extruder untuk di gunakan sebagai pengganti  angin ( membersihkan anggota badan karyawan splicing dan Extruder ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SUPENDI', 0, 0, 0, 0, 0, '2023-06-05', '5', 'J-6753', 'DLL', 'B', '-', '', ''),
(114, '98800/132/07/23', '0000-00-00', 'CBM', 'Mohon di lakukan pekerjaan sbb : Pembuatan partisi di area perbatasan antara mantenance dan cleaning mold Plant-C. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'ENTI S', 0, 0, 0, 0, 0, '2023-08-04', '5', 'J-6864', 'DLL', 'B', 'Workshop', '', ''),
(115, 'CFH/36/VIII/23', '0000-00-00', 'CFH', 'Mohon bantuannya untuk modifikasi cerobong dump compound mesin CBM-2.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'SUPENDI', 0, 0, 0, 0, 0, '2023-08-25', '5', 'J-6936', 'HSE', 'B', '-', '', ''),
(116, 'CXS/39/VIII/23', '0000-00-00', 'CXS', 'Penyesuaian cerobong Talc CXS-1 dan pemasangan mesin CXS-1. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'ARIF M', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6949', 'MD', 'B', '-', '', ''),
(117, '98800/166/09/23', '0000-00-00', 'CXE', 'Mohon di lakukan pekerjaan pembongkaran Branding unit Existing dan pemasangan 1 set New  Branding CXE 1 unit di Plant-C. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'M LUQMAN', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7022', 'MD', 'B', 'Civil Work', '', ''),
(118, 'CXE/04/IX/23', '0000-00-00', 'CXE', 'Mohon bantuannya untuk pemasangan safety dan cutter Holder untuk mesin OM-1 CXE-3.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDDIN', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7041', 'HSE', 'A', '-', '', ''),
(119, 'CXE/05/X/23', '0000-00-00', 'CXE', 'Mohon bantuannya untuk perbaikan/penambalan lantai storage green stick di section Extruder.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDDIN', 0, 0, 0, 0, 0, '2023-10-25', '5', 'J-7061', 'HSE', 'A', '-', '', ''),
(120, 'CFH/48/X/23', '0000-00-00', 'CFH', 'Mohon bantuannya untuk di lakukan pemasangan power cleaning di samping Heating Room.', '-', 'Elektrik', '-', '-', '-', '-', '-', '3', 'SUPENDI', 0, 0, 0, 0, 0, '2023-11-02', '5', 'J-7074', 'DLL', 'A', '-', '', ''),
(121, 'CBL/42/IX/23', '0000-00-00', 'CBL', 'Mohon untuk di pasangkan plat Yzer 2x4x10mm di area depan mesin Bladder Section CBL.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'ADE T', 0, 0, 0, 0, 0, '2023-11-08', '5', 'J-7094', 'DLL', 'B', 'Civil Work', '', ''),
(122, 'CBM/001/11/23', '0000-00-00', 'CBM', 'Mohon bantuannya untuk penghitungan kebutuhan plat lantai untuk area produksi CBM dan CXE serta pemasangannya. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDDIN', 0, 0, 0, 0, 0, '2023-11-16', '5', 'J-7115', 'DLL', 'B', 'Civil Work', '', ''),
(124, 'HMC/094/V/23', '0000-00-00', 'HMC', 'Mohon di lakukan pemasangan : -. Plat Yzer pada area mesin HMC line 01 Building Plant-H. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '6', 'SIDIQ P', 0, 0, 0, 0, 0, '2023-05-25', '5', 'J-6716', 'DLL', 'B', 'Civil Work', '', ''),
(125, 'BFS/120/VI/23', '0000-00-00', 'BFS', 'Mohon untuk di pasangkan plat bordes di area Got pintu 2 Plant-H ( THE ).', '-', 'Mekanik', '-', '-', '-', '-', '-', '6', 'JOENAIDY G', 0, 0, 0, 0, 0, '2023-06-16', '5', 'J-6783', 'HSE', 'A', 'Civil Work dan W', '', ''),
(126, 'BPW/07/VIII/23', '0000-00-00', 'BPW', 'Mohon di lakukan pemindahan dan perbaikan mesin press No.PB 04 dari Gudang Ban B APW3 ke penerimaan produksi Plant-H.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '6', 'A. RASID', 0, 0, 0, 0, 0, '2023-08-18', '5', 'J-6903', 'MD', 'C', '-', '', ''),
(127, 'BPW/05/VIII/23', '0000-00-00', 'BPW', 'Mohon di lakukan pemindahan dan perbaikan mesin press No.PB 02 dari Gudang Ban B APW3 ke penerimaan produksi Plant-H.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '6', 'A.ASID', 0, 0, 0, 0, 0, '2023-08-18', '5', 'J-6909', 'MD', 'C', '-', '', ''),
(128, 'HTE/199/IX/23', '0000-00-00', 'HTE', 'Mohon di buatkan = -. Dudukan untuk penutup selokan Plant-H, Panjang + ? 10 meter.', '-', 'Mekanik', '-', '-', '-', '-', '-', '6', 'RUDY A', 0, 0, 0, 0, 0, '2023-09-18', '5', 'J-6980', 'DLL', 'B', 'Civil Work dan W', '', ''),
(129, 'HMC/232/X/23', '0000-00-00', 'HMC', 'Mohon di lakukan pekerjaan : Pemindahan panel di area Mushola HMC pada tiang A-18 karena sedang ada pembongkaran Mushola dan toilet. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '6', 'PANGIRING', 0, 0, 0, 0, 0, '2023-11-02', '5', 'J-7069', 'DLL', 'A', '-', '', ''),
(130, 'HTC/274/XI/23', '0000-00-00', 'HTC', 'Mohon di tambahkan lampu Mercury di area Curing Tire HTC : Line 01 : Tiang A19-20/A21-22/ A23-24/A25-26/A27-28/A29-30/A31-32/A33-34/A35-36, Line 03 : Tiang B19-20/B21-22/B23-24/B25-26/B27-28/B29-30/B31-32/B33-34/B35-36. Untuk penerangan pada saat Produksi', '-', 'Elektrik', '-', '-', '-', '-', '-', '6', 'SETYO W', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7126', 'SP', 'B', '-', '', ''),
(131, 'BFS/89/VII/2019', '0000-00-00', 'BFS', 'Mohon di renovasi mushola dan toilet area curing tire Plant-H (Instalasi listriknya).', '-', 'Elektrik', '-', '-', '-', '-', '-', '6', 'TRISNO', 0, 0, 0, 0, 0, '2019-08-28', '5', 'J-5022', 'HSE', 'C', 'Civil Work', '', ''),
(132, '640000-22/VIII/06', '0000-00-00', 'QCB', 'Mohon di modifikasi tinggi Lift di area Repair Tire OE Plant-I sbb : Tinggi sebelum : 200cm, Tinggi sesudah : 245cm.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'DEDE SA', 0, 0, 0, 0, 0, '2022-08-30', '5', 'J-6233', 'MD', 'B', 'Workshop', '', ''),
(133, 'BTD/142/IA/XI/22', '0000-00-00', 'IBG', 'Mohon di pasangkan dancing roll di Accumulator mesin bead Apex Jarlian no.IBG.01.AP03. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'SETYO P', 0, 0, 0, 0, 0, '2022-11-09', '5', 'J-6367', 'MD', 'B', 'Workshop', '', ''),
(134, 'BFS/016/01/23', '0000-00-00', 'BFS', 'Mohon untuk di pasangkan lampu penerangan di : 1. Area center point depan Plant-H  2. Smoking area Plant-I  3. Area parkir depan ITE 04 Plant-I.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'NANA N', 0, 0, 0, 0, 0, '2023-01-23', '5', 'J-6505', 'HSE', 'B', '-', '', ''),
(135, 'BPW/09/I/23', '0000-00-00', 'BPW', 'Mohon di lakukan pekerjaan sbb : -. Pembuatan dan pemasangan pagar wiremesh di area FI Plant-I dari  tiang A44 ke tiang A46.  -. Pembuatan dan pemasangan pintu wiremesh dari pagar wiremesh yang akan di pasang.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'A. RASID', 0, 0, 0, 0, 0, '2023-02-03', '5', 'J-6521', 'MD', 'B', '-', '', ''),
(136, 'ITC/040/II/23', '0000-00-00', 'ITC', 'Mohon di orderkan dan di pasangkan  -. Drill mold stand frame sebanyak 1 unit untuk curing tire Plant-I. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'DWI S', 0, 0, 0, 0, 0, '2023-03-02', '5', 'J-6582', 'MD', 'A', '-', '', ''),
(137, 'ICL/080/IV/23', '0000-00-00', 'ICL', 'Mohon di lakukan pek : Perbaikan rell pintu utama 1.1 ICL yang rusak (Safety). M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'ERIKA SP', 0, 0, 0, 0, 0, '2023-05-12', '5', 'J-6704', 'HSE', 'A', 'Civil Work', '', ''),
(139, 'BTD/051/LV/V/23', '0000-00-00', 'BTD', 'Mohon untuk di lakukan pemasangan auto star roll di mesin Building Jing Ye IMC 12.05 - IMC 12.09. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'MABRURI', 0, 0, 0, 0, 0, '2023-06-05', '5', 'J-6737', 'SPC', 'A', '-', '', ''),
(140, 'ITE/153/VII/23', '0000-00-00', 'ITE', 'Mohon di lakukan pek. : Modifikasi ducting cementing mesin ITE 01.01, ITE 02.01, ITE 03.01, ITE 05.01 dan ITE 06.01. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'RAHMAT HL', 0, 0, 0, 0, 0, '2023-07-18', '5', 'J-6822', 'MD', 'B', '-', '', ''),
(141, 'BPW/06/VI/23', '0000-00-00', 'BPW', 'Mohon di pasangkan lampu High Bay sebanyak 2 Bh di tiang A6 area penerimaan produksi Plant-I.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'A. RASID', 0, 0, 0, 0, 0, '2023-07-18', '5', 'J-6833', 'SP', 'A', '-', '', ''),
(142, 'ITL/185/VIII/23', '0000-00-00', 'ITL', 'Mohon di pasangkan mesin Slitter compond di area compound mesin ITL 01.01 (Buzuluk). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'ROMLI S', 0, 0, 0, 0, 0, '2023-08-21', '5', 'J-6917', 'INM', 'B', '-', '', ''),
(143, 'BFS/150/IX/22', '0000-00-00', 'BFS', 'Mohon di buatkan sesuai gambar lokasi area makan di Plant-I ( 1 titik ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'JOENAIDY G', 0, 0, 0, 0, 0, '2023-09-04', '5', 'J-6943', 'DLL', 'B', '-', '', ''),
(144, '98800/154/08/23', '0000-00-00', 'IMC', 'Mohon di lakukan pemindahan/relokasi Hanging conveyor Building line 10 beserta assesoriesnya ( mekanik dan elektrik ). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'SUPRIYADI', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6946', 'DLL', 'B', '-', '', ''),
(145, '98800/155/08/23', '0000-00-00', 'IMC', 'Mohon di lakukan pemasangan 8 unit mesin Building Ex. IMC line 05 di line 10 beserta assesoriesnya ( mekanik dan elektrik ). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'SUPRIYADI', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6948', 'SPC', 'B', '-', '', ''),
(146, 'IMC/146/VI/23', '0000-00-00', 'IMC', 'Mohon di lakukan pekerjaan : Pembuatan pagar panel mesin BTU sebanyak 62 set/pcs untuk line 01.02, 03.04, 05.06 dan 11 Departement Building Tire Plant-I. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'M. MUSLIH', 0, 0, 0, 0, 0, '2023-09-20', '5', 'J-6988', 'HSE', 'B', '-', '', ''),
(147, '98800/164/09/23', '0000-00-00', 'ITC', 'Mohon di lakukan pekerjaan pemasangan New Curing Auto di line 13 sebanyak 10 unit ( MEP dan Assesories ). CEP : 16030110723001NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'SUPRIYADI', 0, 0, 0, 0, 0, '2023-09-26', '5', 'J-6993', 'INM', 'C', '-', '', ''),
(148, 'BPP/05/IX/23', '0000-00-00', 'BPP', 'Mohon untuk di pasangkan kabel line area IMC.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'H. DEDI', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7000', 'HSE', 'A', '-', '', ''),
(149, 'BTD/116/BB/I/23', '0000-00-00', 'BTD', 'Mohon di buatkan kran angin khusus untuk mesin CNC Plant-I. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'SETYO P', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7045', 'SP', 'A', '-', '', ''),
(150, 'ITC/240/X/23', '0000-00-00', 'ITC', 'Mohon di orderkan dan di pasangkan lampu penerangan atas di antara line-5 dan line-6 ITC ( area di', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'DWI S.', 0, 0, 0, 0, 0, '2023-11-02', '5', 'J-7068', 'SP', 'A', '-', '', ''),
(151, '641100-23/X/023', '0000-00-00', 'IFI', 'Mohon di pasangkan belt conveyor Ex.Splicing line 3 ke conveyor 2nd check IFI.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'M. HAMID', 0, 0, 0, 0, 0, '2023-11-08', '5', 'J-7087', 'SP', 'B', '-', '', ''),
(152, 'BFS/244/X/23', '0000-00-00', 'BFS', 'Mohon untuk dapat di pindahkan tiang lampu depan Plant-I & di buatkan jalur kabel/sodetan di bawah.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'NUGRO', 0, 0, 0, 0, 0, '2023-11-10', '5', 'J-7099', 'DLL', 'A', '-', '', ''),
(153, 'IMC/275/XI/23', '0000-00-00', 'IMC', 'Mohon di orderkan dan di pasangkan : Lampu LED pada tiang A15, A17, A19 line 01, Building Tire Plant-I (3 pcs). M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'M. MUSLIH', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7127', 'SP', 'A', '-', '', ''),
(154, 'BPW/05/XI/23', '0000-00-00', 'BPW', 'Mohon di orderkan dan di pasangkan 1 Bh kipas angin blower di area tempel stiker penerimaan produksi Plant-I di tiang A 47.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'A. RASID', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7141', 'DLL', 'A', '-', '', ''),
(155, '98800/206/11/23', '0000-00-00', 'IBG', 'Mohon di lakukan pekerjaan pemasangan mesin Bead Apex baru (Hewei) sebanyak 2 unit , Beserta Assesoriesnya ( Mekanik dan Elektrik ) CEP : 16010310723001BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'SUPRIYADI', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7148', 'INM', 'B', '-', '', ''),
(156, 'ITE/286/XI/23', '0000-00-00', 'ITE', 'Mohon di lakukan pekerjaan : Pembuatan dan pemasangan tangga cementing untuk mesin ITE 06.01 Sebanyak 1 unit untuk Tread Extruder Plant I. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'RAHMAT HL', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7150', 'SP', 'A', '-', '', ''),
(157, 'ITL/292/XI/23', '0000-00-00', 'ITL', 'Mohon di lakukan pekerjaan : Di orderkan dan di pasangkan lampu penerangan -. Area karantina IB ITL 02.01 (batas antara ITL dan ICL) sebanyak 1 unit.  -. Area ISL sebanyak 1 unit. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'ERIKA SP', 0, 0, 0, 0, 0, '2023-12-05', '5', 'J-7153', 'QN', 'A', '-', '', ''),
(158, 'ICL/293/XI/23', '0000-00-00', 'ICL', 'Mohon di lakukan pekerjaan : Di orderkan dan di pasangkan lampu penerangan area Storage Nylon ICL sebanyak 1 unit. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'ERIKA SP', 0, 0, 0, 0, 0, '2023-11-05', '5', 'J-7154', 'QN', 'A', '-', '', ''),
(159, 'ITE/295/XI/23', '0000-00-00', 'ITE', 'Mohon di lakukan pekerjaan : Pemasangan lampu penerangan baru  -.Area mesin ITE 05.01 sebanyak 1 unit  -.Area mesin ITE 06.01 sebanyak 1 unit. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'RAHMAT HL', 0, 0, 0, 0, 0, '2023-11-05', '5', 'J-7157', 'HSE', 'A', '-', '', ''),
(160, 'ITE/300/XII/23', '0000-00-00', 'ITE', 'Mohon di lakukan pekerjaan pembuatan dan pemasangan pembatas air cooling tank ITE 02.01 di Tread Extruder Plant-I. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'RAHMAT HL', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7171', 'HSE', 'A', '-', '', ''),
(161, 'DFS/01/02/17', '0000-00-00', 'DFS', 'Mohon di rehab parkir motor plant D/K menjadi 2 lantai. CEP : M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'IPIK G', 0, 0, 0, 0, 0, '2017-04-28', '5', 'J-4171', 'DLL', 'C', 'Civil Work', '', ''),
(162, '98800/152/12/21', '0000-00-00', 'DTL', 'Mohon bantuanya untuk di lakukan pekerjaan relokasi Profilometer online DTL-1 Ex.Tongyang ke mesin DTL-3. CEP : M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2021-12-17', '5', 'J-5825', 'MD', 'C', 'Civil Work', '', ''),
(163, 'DTC/002/III/22', '0000-00-00', 'DTC', 'Mohon di pasang plat besi roll di depan mesin line M & N untuk posisi centering Green Stand dan Loader dengan ukuran : Panjang line : @73,5mm, Lebar plate : 120 Cm, Tebal plate : 8mm.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'SUPARDI', 0, 0, 0, 0, 0, '2022-03-30', '5', 'J-5979', 'HSE', 'C', 'Civil Work', '', ''),
(164, '013/MCD/VII/22', '0000-00-00', 'MCD', 'Mohon di pindahkan kotak Hydrant area merokok MCD yang semula di belakang di pindah ke depan.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'JOKO S', 0, 0, 0, 0, 0, '2022-07-26', '5', 'J-6154', 'DLL', 'A', '-', '', ''),
(165, 'DMP/032/11/22', '0000-00-00', 'DMP', 'Mohon pengadaan pembuatan dan pemasangan steger ruang cooling drum DCL-1 dan steger ruang roll calender DCK-1 ( masing-masing 1 set ) M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'EKO Y', 0, 0, 0, 0, 0, '2022-11-09', '5', 'J-6369', 'SP', 'A', '-', '', ''),
(166, 'DTL/01/03/23', '0000-00-00', 'DTL', 'Penggantian MCB/Power dan Instalasi pengawatan area WS 2. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'KISWANTO', 0, 0, 0, 0, 0, '2023-03-09', '5', 'J-6597', 'DLL', 'A', '-', '', ''),
(167, '98800/060/03/23', '0000-00-00', 'DFI', 'Mohon untuk di lakukan pekerjaan pembuatan jembatan conveyor DPW1 - DPW3. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-03-30', '5', 'J-6625', 'SPC', 'C', '-', '', ''),
(168, '98800/066/03/23', '0000-00-00', 'DRB', 'Mohon di lakukan pekerjaan pemasangan mesin Saferun SH2 dan SH3 (mekanik & elektrik) beserta assesoriesnya. CEP : 12020019022012NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-04-07', '5', 'J-6646', 'INM', 'B', '-', '', ''),
(169, '98800/069/03/23', '0000-00-00', 'DRB', 'Mohon di lakukan pekerjaan pemasangan mesin Saferun SE 1 dan SE 2 ( mek dan elek ) beserta assesoriesnya. 120200190022012NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-04-14', '5', 'J-6669', 'INM', 'C', '-', '', ''),
(170, '98800/068/03/23', '0000-00-00', 'DRB', 'Mohon bantuannya untuk di lakukan pekerjaan pembongkaran mesin DRB VMI E1, E2 & E3. 120200190022012NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-04-14', '5', 'J-6670', 'DLL', 'B', 'Civil Work', '', ''),
(171, '98800/081/05/23', '0000-00-00', 'DRB', 'Mohon di lakukan pekerjaan modifikasi Hanging conveyor untuk DRB SG 1 dan SH 1. CEP :  12020019022012NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-06-05', '5', 'J-6754', 'MD', 'C', 'Workshop', '', ''),
(172, '98800/097/06/23', '0000-00-00', 'DTE', 'Mohon bantuannya untuk pemindahan CCD with camera include frame dan panelnya ( Ex.Taihe ) ke area dekat running scale DTE-4. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-07-05', '5', 'J-6788', 'DLL', 'A', '-', '', ''),
(174, 'JLB/042/VII/23', '0000-00-00', 'JLB', 'Pembuatan cerobong output ( pembuangan butiran karbon ) di ruang buffing Lab-D.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'EJA AM', 0, 0, 0, 0, 0, '2023-08-11', '5', 'J-6889', 'DLL', 'C', '-', '', ''),
(175, 'JQA/1/07/23', '0000-00-00', 'JQA', 'Mohon di bantu untuk pembuatan barang sbb : Rak sample compound JQA.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'TULUS', 0, 0, 0, 0, 0, '2023-08-22', '5', 'J-6924', 'DLL', 'A', '-', '', ''),
(176, '98800/149/08/23', '0000-00-00', 'DTC', 'Mohon di lakukan pemasangan/perbaikan conveyor WSW-Repair Plant D/K. Cep:12020019022015NA', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6971', 'QN', 'C', 'Workshop', '', ''),
(177, 'JWS/005/IX/23', '0000-00-00', 'JWS', 'Mohon di buatkan panel listrik untuk Trafo las pada area Repair Mold PCR Plant-D, sebanyak 2 titik.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'ACH DWI', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7003', 'DLL', 'B', '-', '', ''),
(178, 'DTD/0358/09/23', '0000-00-00', 'DTD', 'Modifikasi Hoist di area Technical Mold KMC Before : Wireles After : Memakai kabel. Note : Untuk Safety dan pencegahan container mold cacat. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'SUMINTO', 0, 0, 0, 0, 0, '2023-11-07', '5', 'J-7009', 'HSE', 'C', '-', '', ''),
(179, '98800/180/10/23', '0000-00-00', 'DRB', 'Mohon bantuannya untuk di lakukan pemasangan mesin Saferun sebanyak 2 unit DRB SH2 dan SH 3. CEP : 120200190220012NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-10-12', '5', 'J-7033', 'INM', 'C', '-', '', ''),
(180, '98800/177/10/23', '0000-00-00', 'DTC', 'Mohon bantuannya untuk di lakukan modifikasi Hanging conveyor DGP 3 (sesuai gbr ) mek & elektriknya.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-10-12', '5', 'J-7034', 'MD', 'B', 'Workshop', '', ''),
(181, '98800/178/10/23', '0000-00-00', 'DTC', 'Mohon bantuannya untuk di lakukan modifikasi Hanging conveyor DGP 5 (sesuai gbr ) mek & elektriknya.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-10-12', '5', 'J-7035', 'MD', 'B', 'Workshop', '', ''),
(182, '450500/034/X/23', '0000-00-00', 'JRD', 'Pemasangan mesin Tire Changer pada ruang Rim storage Resource menggunakan yang sudah ada.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'LUTFI A', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7054', 'DLL', 'A', '-', '', ''),
(183, '02/SPSI/GT/X/23', '0000-00-00', 'SPSI', 'Mohon di pasangkan power listrik untuk kipas angin di kantor SPSI.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'SIDIQ P', 0, 0, 0, 0, 0, '2023-11-02', '5', 'J-7070', 'DLL', 'A', '-', '', ''),
(184, 'DMP/031/10/23', '0000-00-00', 'DMP', 'Mohon di bongkarkan pipa air AC NCP sebanyak 2 unit (dua) Supply dan Return area DRB 4 dan DSC, Steel Calender Plant-PCR. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'BOGI', 0, 0, 0, 0, 0, '2023-11-02', '5', 'J-7080', 'DLL', 'A', '-', '', ''),
(185, '225/JMW/X/23', '0000-00-00', 'JMW', 'Mohon untuk di tambahkan modul pada smoke detector agar terhubung langsung dengan fire alarm yang ada di lokasi Gudang ARM 3.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'APRIAL', 0, 0, 0, 0, 0, '2023-11-08', '5', 'J-7090', 'HSE', 'A', '-', '', ''),
(186, '98800/195/10/23', '0000-00-00', 'DTL', 'Mohon bantuannya untuk di lakukan pemasangan signal alarm and verification tool untuk Equpment auto hole detection di DTL-2. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-11-08', '5', 'J-7098', 'QN', 'A', '-', '', ''),
(187, '98800/198/11/23', '0000-00-00', 'DFI', 'Mohon di lakukan pekerjaan pembongkaran mesin DUF 16 lama, serta di pasangkan mesin baru  DUF 16 ( mekanik, elektrik dan ACC ). CEP : 64030010421004BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-11-16', '5', 'J-7110', 'DLL', 'B', 'Civil Work', '', ''),
(188, '98800/197/11/23', '0000-00-00', 'DFI', 'Mohon di lakukan pekerjaan pembongkaran mesin DUF 14 lama serta di pasangkan mesin DUF 14 baru ( mekanik, elektrik dan Acc ). CEP : 65020010421024BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-11-16', '5', 'J-7111', 'INM', 'B', 'Civil Work', '', ''),
(189, '98800/210/11/23', '0000-00-00', 'DSC', 'Mohon bantuannya untuk di pasangkan part part completion modifikasi Flipper DBB 4. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7128', 'DLL', 'A', '-', '', ''),
(190, '98800/213/11/23', '0000-00-00', 'DTE', 'Mohon bantuannya untuk di pasangkan roller hitam ( 2 pcs ) di area online profiloter DTE-4 material dari Taihe.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7166', 'MD', 'A', '-', '', '');
INSERT INTO `pengajuan_job_order` (`id`, `no_jo`, `tgl_jo`, `cc_no`, `pekerjaan`, `tujuan`, `pelaksana`, `rencana`, `cep_no`, `lampiran`, `dwg_no`, `mesin_no`, `id_plant`, `id_pemesan`, `id_depthead`, `id_planthead`, `id_factoryhead`, `id_eng_depthead`, `id_penerima`, `tgl_terima`, `status`, `no_file`, `klasifikasi`, `golongan`, `departemen_lain`, `saran_dept`, `saran_plant`) VALUES
(191, '98800/212/11/23', '0000-00-00', 'DRB', 'Mohon bantuannya untuk di lakukan modifikasi pagar lifter Hanging conveyor menggunakan engsel ( untuk mempermudah maintenance ) di DRB Sa dan SB ( 6 unit lifter ). M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7167', 'MD', 'B', '-', '', ''),
(192, 'JLB/080/XI/23', '0000-00-00', 'JLB', 'Penambahan source angin pada ruang Buffing Laboratorium - D. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'EJA AM', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7168', 'MD', 'A', '-', '', ''),
(193, '98800/215/11/23', '0000-00-00', 'DSC', 'Mohon bantuannya untuk pemasangan lifter Dalmec di mesin DBB 1 ( elektik dan mekanik ). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7169', 'HSE', 'A', '-', '', ''),
(194, 'DTC/004/VI/22', '0000-00-00', 'DTC', 'Mohon untuk di buatkan scondary containment silicon untuk mesin DGP-01, DGP=04, DGP-06 dan DGP-07 dengan ukuran 100cmx50cmx60cm.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'SUPARDI', 0, 0, 0, 0, 0, '2022-07-04', '5', 'J-6110', 'HSE', 'B', 'Civil Work', '', ''),
(195, 'DPW/001/12/22', '0000-00-00', 'DPW', 'Mohon perbaikan box talang utama Gudang DPW-1 ( besi penyangga lepas ).', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'YUDI G', 0, 0, 0, 0, 0, '2022-12-20', '5', 'J-6449', 'DLL', 'A', 'Civil Work', '', ''),
(197, 'DEP/029/10/23', '0000-00-00', 'DEP', 'Mohon di pasangkan/di buatkan Grounding listrik untuk AC WCP sebanyak 10 unit ( 4 unit : Hanwei + 6 unit : Premiere ) di area Steel Calender dan KRB Building. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '8', 'BOGI', 0, 0, 0, 0, 0, '2023-10-23', '5', 'J-7050', 'HSE', 'A', '-', '', ''),
(199, 'JQA/1/3/2022', '0000-00-00', 'JQA', 'Mohon di bantu untuk pembuatan dan pemasangan conveyor Gravity Booking QA, Qty : 2 unit.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '8', 'EDWARD A', 0, 0, 0, 0, 0, '2022-06-23', '5', 'J-6091', 'SPC', 'B', 'Workshop', '', ''),
(200, '98800/172/10/23', '0000-00-00', 'KTC', 'Mohon di lakukan pekerjaan bubut lock green tire lorry sebanyak 64 pcs di bubut sebanyak 5mm serta mohon di lakukan pekerjaan gerinda frame conveyor output curing KTC line MN sebanyak 32 set. M&R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '8', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-11-06', '5', 'J-7084', 'MD', 'C', 'Workshop', '', ''),
(202, '038/MCG/VIII/22', '0000-00-00', 'MCG', 'Mohon di buatkan digital size compound untuk area mixer dan roll die (MCG-17).', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'SUPRIYANTO', 0, 0, 0, 0, 0, '2022-08-30', '5', 'J-6230', 'SP', 'A', '-', '', ''),
(203, 'MPU/020/02/23', '0000-00-00', 'MPU', 'Mohon di bongkar bak tower lama sudah tidak di gunakan di area Utility GK. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ANGGARA', 0, 0, 0, 0, 0, '2023-02-14', '5', 'J-6544', 'DLL', 'A', 'Civil Work', '', ''),
(204, '98800/022/01/23', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan sbb : Relokasi ( pembongkaran & pemasangan ) OM OES dan assesories sebanyak 2 set.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-02-23', '5', 'J-6580', 'MD', 'B', 'Civil Work', '', ''),
(205, '020/MCA/V/23', '0000-00-00', 'MCA', 'Mohon di lakukan pekerjaan sbb : 1. Relokasi peninggian tangki oil feeding 1 MCA   2. Relokasi peninggian tangki oil feeding 2 MCA  3. Relokasi peninggian pipa transfer oil feeding 1 MCA.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'HERMAWAN', 0, 0, 0, 0, 0, '2023-05-25', '5', 'J-6733', 'MD', 'C', '-', '', ''),
(206, '020/MCD/VI/23', '0000-00-00', 'MCD', 'Mohon di lakukan pemasangan running text di area produksi MCD, include frame + supply power listrik, titik pemasangan di depan Raw system &#40; tiang 5-6 &#41;.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2023-07-05', '5', 'J-6800', 'SP', 'A', '-', '', ''),
(207, '98800/108/06/23', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan sbb :  Pembuatan Steel Struktur Hoist Mantenance MCD-8.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-07-14', '5', 'J-6814', 'SPC', 'B', '-', '', ''),
(208, '063/MCG/VII/23', '0000-00-00', 'MCG', 'Mohon di orderkan dan di pasangkan Flowmeter di tangki 1 dan tangki 2 area oli feeding 01 MCG.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'TAGAR T', 0, 0, 0, 0, 0, '2023-07-31', '5', 'J-6857', 'DLL', 'A', '-', '', ''),
(209, '030/MCD/VIII/23', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan pemasangan plat besi di area lantai atas MCD, dengan luas area 1386m?.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2023-08-18', '5', 'J-6911', 'QN', 'C', 'Civil Work', '', ''),
(210, '149/JMW/VIII/23', '0000-00-00', 'JMW', 'Mohon untuk meng up grade teknologi bandul pada tangki oli di MCA, MCD dan MCG. Note : Saat ini bandul menggunakan sistem pelampung manual.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ARON G', 0, 0, 0, 0, 0, '2023-08-18', '5', 'J-6913', 'DLL', 'A', '-', '', ''),
(211, '074/MCG/VII/23', '0000-00-00', 'MCG', 'Mohon di lakukan perbaikan lantai dekat tiang conveyor Weighing Scale MCG 14 atas.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'TEGAR T', 0, 0, 0, 0, 0, '2023-08-29', '5', 'J-6937', 'HSE', 'B', 'Civil Work', '', ''),
(212, '172/JMW/VIII/23', '0000-00-00', 'JMW', 'Pemasangan mixer covex di area gudang bahan sebanyak 9 titik dengan rincian :  ARM 1 = 3 titik, ARM 3 = 1 titik ARM 5 = 1 titik, ARM 17 = 4 titik.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'APRIAL', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6968', 'HSE', 'A', '-', '', ''),
(213, '98800/148/08/23', '0000-00-00', 'MCA', 'Mohon bantuannya untuk di lakukan pekerjaan pembongkaran mesin Mixer MCA 8 dan Assesoriesnya berikut modifikasi jalur Ducting. CEP : 11080110922008NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6973', 'MD', 'B', 'Civil Work', '', ''),
(214, '98800/147/08/23', '0000-00-00', 'MCA', 'Mohon bantuannya untuk di lakukan pekerjaan pemasangan timbangan compound berikut Assesoriesnya di mesin Bach Off MCA ( 4 set ). M  & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6974', 'QN', 'A', '-', '', ''),
(215, '066/MCG/VII/23', '0000-00-00', 'MCG', 'Mohon di lakukan perbaikan lantai area produksi MCG 10 dan MCG 11 atas ( area tiang N-19 atas sebanyak 4 titik ).', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'TEGAR T', 0, 0, 0, 0, 0, '2023-10-10', '5', 'J-7024', 'HSE', 'B', 'Civil Work', '', ''),
(216, '016/MCI/23', '0000-00-00', 'MCI', 'Mohon di pasang Box Elevator MCI 2.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'SUPRIYANTO', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7046', 'SP', 'B', '-', '', ''),
(217, '097/MCG/X/23', '0000-00-00', 'MCG', 'Mohon di ganti dan di pasangkan elbow pipa HDPE air RO di area MCG.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-11-08', '5', 'J-7095', 'DLL', 'A', '-', '', ''),
(218, '052/MCA/X/23', '0000-00-00', 'MCA', 'Mohon di perbaiki lantai dekat Elevator 2 bawah lepas.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DEDI A', 0, 0, 0, 0, 0, '2023-11-10', '5', 'J-7100', 'HSE', 'A', '-', '', ''),
(219, '053/MCA/X/23', '0000-00-00', 'MCA', 'Mohon di perbaiki lantai area Booking MCA 5-6 menganga (potensi orang tersandung dan garpu FL tersangkut).', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DEDI A', 0, 0, 0, 0, 0, '2023-11-22', '5', 'J-7120', 'HSE', 'A', '-', '', ''),
(220, '099/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di perbaiki lantai dan plat rusak area depan Batch Off MCG-10.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-11-23', '5', 'J-7122', 'HSE', 'A', 'Civil Work', '', ''),
(221, '106/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di lakukan penggantian lampu penerangan di area Daybin MCG-3 s/d MCG-7 sebanyak 20 titik.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7131', 'SP', 'B', '-', '', ''),
(222, '107/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di buatkan dan di pasangkan pagar arah Tandon di area MCG.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7137', 'HSE', 'B', '-', '', ''),
(223, '111/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di pindahkan mesin Ex. Penimbangan crunb Rubber.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7143', 'DLL', 'A', '-', '', ''),
(224, '105/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di tambahkan dan di pasangkan titik untuk lampu penerangan di area Daybin MCG-3 s/d MCG-7, masing-masing area Daybin di tambah 4 titik. Note : Penambahan di area Daybin lantai 3.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7144', 'SP', 'A', '-', '', ''),
(225, '109/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di orderkan dan di pasangkan lampu penerangan area MCG-3 atas dan MCG-4 atas yang sudah menguning ( 30 pcs ).', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7145', 'HSE', 'B', '-', '', ''),
(226, '118/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di pasang dan di pindahkan lampu Emergency sesuai titik Layout di area MCG sebanyak 9 titik.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-12-05', '5', 'J-7152', 'HSE', 'A', '-', '', ''),
(227, '121/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di pindahkan lampu (panel) dari tiang B7 ke tiang B8 area antara MCG-17 dan MCG-1.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-12-05', '5', 'J-7156', 'DLL', 'A', '-', '', ''),
(228, '123/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di ganti panel rubber cutter menggunakan box dengan tombol Emergency.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7176', 'MD', 'A', '-', '', ''),
(229, '122/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di ganti Safety rope ke Safety Button mesin MCG.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7177', 'MD', 'B', '-', '', ''),
(230, 'RFH/02/12/22', '0000-00-00', 'RFH', 'Perbaikan kanopi yang rusak di area loading compound Extruder TBR ( kanopi rusak tertimpa pohon tumbang ).', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'SUHERMAN', 0, 0, 0, 0, 0, '2022-12-21', '5', 'J-6450', 'DLL', 'A', 'Civil Work', '', ''),
(231, '98800/009/01/23', '0000-00-00', 'RSC', 'Mohon bantuannya untuk pemasangan 260 lbr plat lantai 8mm di area mesin Steel Calender Ex. Softex. CEP : 52010511023001BA.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-01-16', '5', 'J-6491', 'QN', 'C', 'Civil Work', '', ''),
(232, '98800/017/01/23', '0000-00-00', 'RTB', 'Mohon bantuannya untuk pemasangan mesin Building line-A ( RTB-A1 ) beserta dengan MEP ( mek, elek dan plumbing ). CEP : 50030011023001BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-01-23', '5', 'J-6509', 'INM', 'C', '-', '', ''),
(233, 'JQA(RFI)/01/II/23', '0000-00-00', 'RFI', 'Pembuatan teralis jendela area FI TBR di karenakan temuan patrol/genba Qty : 27 pcs.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'EDY S', 0, 0, 0, 0, 0, '2023-02-23', '5', 'J-6569', 'HSE', 'C', '-', '', ''),
(234, '98800/045/03/23', '0000-00-00', 'RTC', 'Mohon di lakukan pemasangan 8 set mesin curing RTC line IJ (mek, elek, assesoris). 50020011022003NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-03-30', '5', 'J-6626', 'INM', 'C', '-', '', ''),
(235, '98800/047/03/23', '0000-00-00', 'RTC', 'Mohon di lakukan relokasi mesin hot repair TBR 8 set (untuk project curing 8 set). 50020011022003NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-03-30', '5', 'J-6627', 'MD', 'B', 'Civil Work', '', ''),
(236, '98800/048/03/23', '0000-00-00', 'RTC', 'Mohon di lakukan relokasi mesin manual trimming + conveyor Booking TBR-3 set ( untuk project curing 8 set). 50020011022003NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-03-30', '5', 'J-6628', 'MD', 'B', 'Civil Work', '', ''),
(237, 'R/RPW/11/03/23', '0000-00-00', 'RPW', 'Pembuatan dan pemasangan pintu loading dock (RPW 3, Ex.Softex) Uk. L : 3.5 mtr, T : 4.5 mtr.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'DANANG W', 0, 0, 0, 0, 0, '2023-04-10', '5', 'J-6661', 'DLL', 'A', 'Civil Work', '', ''),
(238, '98800/046/03/23', '0000-00-00', 'RTC', 'Mohon di lakukan pengadaan, modifikasi existing dan pemasangan baru conveyor behind curing-FI RTC Line II. CEP : 50020011022003NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-05-25', '5', 'J-6724', 'SPC', 'B', 'Workshop', '', ''),
(239, 'GSS/AST2/06/VII/23', '0000-00-00', 'GSS', 'Pembuatan tanjakan troli di Stationary 2 ( Ex.Softex ).', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'M IRFAN', 0, 0, 0, 0, 0, '2023-08-08', '5', 'J-6882', 'DLL', 'A', 'Civil Work', '', ''),
(240, 'GSS/AST2/05/VII/23', '0000-00-00', 'GSS', '1. Pemindahan portal di Stationary 2 ( Ex.Softex )  2. Pembuatan pintu besi di Stationary 2.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'M IRFAN', 0, 0, 0, 0, 0, '2023-08-08', '5', 'J-6883', 'DLL', 'B', '-', '', ''),
(241, 'JBW/090/06/23', '0000-00-00', 'JBW', 'Mohon di buatkan untuk tutup bak barang Ex. Bekas pengambilan barang ( u/ kapasitas 4 bak ).', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'CATUR', 0, 0, 0, 0, 0, '2023-08-09', '5', 'J-6886', 'DLL', 'B', '-', '', ''),
(242, '036/IEM/VIII/23', '0000-00-00', 'IEM', 'Penambahan dan pemasangan lampu PJU.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'TAUFIQ', 0, 0, 0, 0, 0, '2023-08-25', '5', 'J-6930', 'HSE', 'A', '-', '', ''),
(243, '98800/156/09/23', '0000-00-00', 'RTB', 'Mohon bantuannya untuk pekerjaan pemasangan AC 30 PK sebanyak 2 unit di ruangan New Green Tire Storage untuk Project Expansi Building Machine TBR 2700. CEP : 50030011023001BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-09-19', '5', 'J-6981', 'SPC', 'B', '-', '', ''),
(244, '98800/162/09/23', '0000-00-00', 'RSC', 'Mohon bantuannya untuk pemasangan centering side gum edge tape pada mesin Steel cutter RSC-BC 2. CEP : 52010511021001NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7006', 'QN', 'A', '-', '', ''),
(245, '98800/163/09/23', '0000-00-00', 'RTB', 'Mohon bantuannya untuk pemasangan Tread Applier with Auto length and width di mesin Building Ex. Seyen RTB-A1. CEP : 52020111022004BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7007', 'QN', 'B', '-', '', ''),
(246, 'RFH/03/09/23', '0000-00-00', 'RFH', 'Mohon di lakukan pemasangan Emergency Lamp di area Plant-TBR. Qty : 10 unit.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'SUHERMAN', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7012', 'HSE', 'A', '-', '', ''),
(247, '178/JMW/VIII/23', '0000-00-00', 'JMW', 'Pembuatan tangga untuk keperluan penyimpanan surat jalan angkutan di kantor loket Gudang ARM17.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'APRIAL', 0, 0, 0, 0, 0, '2023-10-07', '5', 'J-7015', 'DLL', 'A', '-', '', ''),
(248, '051/IEM/X/23', '0000-00-00', 'IEM', 'Penambahan dan pemasangan lampu PJU di pertigaan Kansai.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'TAUFIQ', 0, 0, 0, 0, 0, '2023-11-02', '5', 'J-7076', 'HSE', 'A', '-', '', ''),
(249, 'PE-R/087/10/23', '0000-00-00', 'RSC', 'Pemindahan metal detector conveyor transfer OM1 ke conveyor transfer OM2. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'JOKO T', 0, 0, 0, 0, 0, '2023-11-02', '5', 'J-7078', 'MD', 'A', '-', '', ''),
(250, 'PE-R/089/10/23', '0000-00-00', 'RSC', 'Pembuatan dan pemasangan tangga metal detector M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'JOKO T', 0, 0, 0, 0, 0, '2023-11-02', '5', 'J-7079', 'HSE', 'A', '-', '', ''),
(251, '236/JMW/XI/23', '0000-00-00', 'JMW', 'Mohon untuk di pasang colokan 3 Phase untuk mesin hot high preasure cleaner lokasi ARM-1 2 titik, ARM-17 5 titik, ARM-3 1 titik, ARM-5  1 titik.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'APRIAL', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7135', 'DLL', 'A', '-', '', ''),
(252, '237/JMW/XI/23', '0000-00-00', 'JMW', 'Mohon untuk di perbaiki gerigi loading dock yang sudah rusak, lokasi gudang Bassko ARM-15.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'ARON G', 0, 0, 0, 0, 0, '2023-11-29', '5', 'J-7136', 'HSE', 'A', '-', '', ''),
(253, 'RTE/022/11/23', '0000-00-00', 'RTE', 'Mohon di pasangkan plat lantai jalur transportasi area Storage material Ex.Softex non AC dengan ketebalan plat sesuai standard menggunakan budget M & R secara bertahap.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'WAHYU T', 0, 0, 0, 0, 0, '2023-12-05', '5', 'J-7151', 'HSE', 'C', 'Civil Work', '', ''),
(254, '247/JMW/XI/23', '0000-00-00', 'JMW', 'Mohon untuk di pasangkan lampu TL sebanyak 8 titik untuk penerangan lorong belakang lokasi Gudang bahan ARM-17 gedung A.  -. Tiang A4 sebelah kiri : 1 titik.  -. Tiang A8 sebelah kiri : 1 titik \'-.Tiang A12 sebelah kiri : 1 titik.  -.Tiang A16 sebelah kir', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'ARON G', 0, 0, 0, 0, 0, '2023-12-05', '5', 'J-7155', 'HSE', 'A', '-', '', ''),
(255, 'R/RPW/28/11/23', '0000-00-00', 'RPW', 'Perbaikan lantai yang rusak dan pemasangan plat besi di Gudang Ban R 02 jumlah 2 titik.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'DANANG', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7175', 'HSE', 'A', 'Civil Work', '', ''),
(256, '271/JMW/XII/23', '0000-00-00', 'JMW', 'Pemasangan mirror covex di area persimpangan menuju kantor gudang ARM 17.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'ARON G', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7178', 'HSE', 'A', '-', '', ''),
(257, '02/TFH/VIII/22', '0000-00-00', 'TFH', 'Permohonan pembuatan tambahan rest area untuk karyawan di Plant-T.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '11', 'NUGROHO', 0, 0, 0, 0, 0, '2023-10-17', '5', 'J-7038', 'DLL', 'B', 'Civil Work', '', ''),
(258, 'R/RPW/23/10/23', '0000-00-00', 'RPW', 'Pemasangan kipas angin di area Setting Gudang Ban R 03 (Ex.Softex) jumlah : 2 pcs.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'DANANG', 0, 0, 0, 0, 0, '2023-11-08', '5', 'J-7089', 'DLL', 'A', '-', '', ''),
(259, '380100/171/XI/23', '0000-00-00', 'GSR', 'Perbaikan lampu penerangan di pos baru area Gardu Induk dan penambahan tinggi tiang penyanggah kabel dari Gardu Induk 1 ke Gardu Induk 2.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'MULYADI', 0, 0, 0, 0, 0, '2023-12-11', '5', 'J-7164', 'HSE', 'A', '-', '', ''),
(260, '092/MCG/X/23', '0000-00-00', 'MCG', 'Mohon di buatkan dan di pasangkan pagar pembatas Batch Off ( area MCG-17 atas ).', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7055', 'HSE', 'B', '-', '', ''),
(261, '047/MCA/X/23', '0000-00-00', 'MCA', 'Mohon di lakukan pemasangan plat lantai di area Repair Compound, dasaran sebelum di pasang plat minta di lapisi semen.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'SUPRIYANTO', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7056', 'QN', 'B', '-', '', ''),
(262, '98800/189/10/23', '0000-00-00', 'MCD', 'Mohon di pasangkan box Cargo untuk Elevator MCD. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7059', 'HSE', 'C', '-', '', ''),
(263, 'JLB/082/XII/23', '0000-00-00', 'JLB', 'Pemasangan baru MCB 2 pcs untuk power AC 8PK 2 unit di ADT 7 Laborat A Plant-A. M&R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'FIKHRI F', 0, 0, 0, 0, 0, '2023-12-19', '5', 'J-7187', 'QN', 'A', '-', '', ''),
(264, 'ACH/22/II/002', '0000-00-00', 'ACH', 'Modifikasi mesin mixer A3CM-12 untuk mesin mixer A3CM-08 & A3CM-06 sebanyak 2 unit', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'LUKAS F.', 0, 0, 0, 0, 0, '2022-03-24', '5', 'J-5968', 'MD', 'C', '-', '', ''),
(265, 'ACH-23/II/001', '0000-00-00', 'ACH', 'Modifikasi mesin Ex.Cement A3CM-12 menjadi mesin Cement A3CM-06, Cement House Plant-A', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'SAHMU', 0, 0, 0, 0, 0, '2023-02-23', '5', 'J-6565', 'MD', 'B', '-', '', ''),
(266, 'JLB/066/X/23', '0000-00-00', 'JLB', 'Support pemasangan AC outdoor office Laboratoriom. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ANRI AM.', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7048', 'DLL', 'A', '-', '', ''),
(267, 'JLB/073/XI/23', '0000-00-00', 'JLB', 'Pemasangan lampu di ruang ADT-2 dan ruang storage rim Laborat A. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ANRI AM.', 0, 0, 0, 0, 0, '2023-11-16', '5', 'J-7104', 'DLL', 'A', '-', '', ''),
(268, 'BPW/04/VI/23', '0000-00-00', 'BPW', 'Mohon di bongkar pintu wiremesh 1 tiang A46 Gudang Ban BPW-1.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'A.RASID', 0, 0, 0, 0, 0, '2023-07-05', '5', 'J-6809', 'DLL', 'A', '-', '', ''),
(269, 'BXC/260/XI/23', '0000-00-00', 'BXC', 'Mohon di tambahkan lampu penerangan LED di area Curing Tube line 04 tiang : 33, 34, 35 dan ', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'KURDI', 0, 0, 0, 0, 0, '2023-11-16', '5', 'J-7116', 'SP', 'A', '-', '', ''),
(270, 'ITC/126/X/23', '0000-00-00', 'ITC', 'Mohon di orderkan dan di pasangkan : Kipas angin dan lampu penerangan di area Cleaning bead ring di Storage mold sebanyak 1 set untuk Curing Tyre Plant-I. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'DWI S.', 0, 0, 0, 0, 0, '2023-10-20', '5', 'J-7042', 'HSE', 'A', '-', '', ''),
(271, '170/JMW/VIII/23', '0000-00-00', 'JMW', 'Mohon untuk di pasangkan pagar pembatas area penyimpanan sementara palet bekas di ARM-5.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'ARON G.', 0, 0, 0, 0, 0, '2023-09-11', '5', 'J-6945', 'DLL', 'B', '-', '', ''),
(272, 'ACH-23/XII/007', '0000-00-00', 'ACH', 'Pemasangan motor listrik dan gear box (Bur Gear) pada mesin OM 01 Cement house Plant-A. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'SAHMU', 0, 0, 0, 0, 0, '2023-12-27', '5', 'J-7210', 'SP', 'A', '-', '', ''),
(273, '4/GHE/XII/23', '0000-00-00', 'GHE', 'Mohon dapat di buatkan bel untuk keperluan lomba cerdas cermat bulan K3 2024 sebanyak 14 pcs & timer.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ANTON', 0, 0, 0, 0, 0, '2024-01-05', '5', 'J-7225', 'DLL', 'A', '-', '', ''),
(274, 'ATB/002/XII/23', '0000-00-00', 'ATB', 'Pemasangan plat lantai untuk mesin Building ATB-F0 dan BB-51. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'RAYMON', 0, 0, 0, 0, 0, '2024-01-05', '5', 'J-7229', 'HSE', 'A', 'Civil Work', '', ''),
(275, 'JLB/085/XII/23', '0000-00-00', 'JLB', 'Pembuatan tangga besi di jalan samping laborat beserta pagar besinya, laborat Plant-A. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'HERU', 0, 0, 0, 0, 0, '2024-01-05', '5', 'J-7230', 'DLL', 'B', '-', '', ''),
(276, 'BTD/142/ID/XII/23', '0000-00-00', 'BTD', 'Mohon di buatkan box untuk packaging part mesin dengan ukuran 400mmx350mmx300mm.M&R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'MABRURI', 0, 0, 0, 0, 0, '2023-12-19', '5', 'J-7184', 'DLL', 'A', '-', '', ''),
(277, 'BPW/02/XII/23', '0000-00-00', 'BPW', 'Mohon agar di orderkan dan di pasangkan lampu TL sebanyak 2 bh di kantor adm 1st floor gudang ban BPW 1.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'A. RASID', 0, 0, 0, 0, 0, '2023-12-19', '5', 'J-7196', 'DLL', 'A', '-', '', ''),
(278, 'BFS/313/XII/23', '0000-00-00', 'BFS', 'Mohon untuk di pasangkan : -. Kabel line area BBC  -. Kabel line area BMC  -. Kabel line area HMC  pemasangan kabel power dan stop kontak. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'DEDIE S', 0, 0, 0, 0, 0, '2024-01-05', '5', 'J-7226', 'SP', 'A', '-', '', ''),
(279, '98800/218/12/23', '0000-00-00', 'ITL', 'Mohon di lakukan pembongkaran 2 unit Extruder ITL 03.01 dan di lakukan pemasangan New Extruder ITC 03.01 ( 2 unit ) (mekanik, elektrik, assesories dan infrastruktur).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'SUPRIYADI', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7189', 'INM', 'C', '-', '', ''),
(280, 'ITC/276/XI/23', '0000-00-00', 'ITC', 'Mohon di lakukan perbaikan : -. Lantai tutup saluran air rusak harap menggunakan plat sesuai gambar rata & rapi di tiang ( 33 line 05 dan 06 ITC untuk curing tire Plant-I. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'DWI S', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7198', 'HSE', 'A', '-', '', ''),
(281, 'BTD/143/ID/XII/23', '0000-00-00', 'BTD', 'Mohon untuk pemasangan mesin converter di area rewinding liner Building Plant-I. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'MABRURI', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7203', 'SP', 'A', '-', '', ''),
(282, 'BTD/144/ID/XII/23', '0000-00-00', 'BTD', 'Mohon untuk di pasangkan modifikasi wind up mesin Tubless calender Ex.Buzuluk (ITL.01.01). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'MABRURI', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7206', 'MD', 'B', '-', '', ''),
(283, '451000/041/XII/23', '0000-00-00', 'JRD', 'Pemindahan source tegangan supply mesin CNC R & D (DCC-1) di gedung lab R&D. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'JOKO P', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7204', 'DLL', 'A', '-', '', ''),
(284, 'DSC/01/12/23', '0000-00-00', 'DSC', 'Mohon di buatkan & di pasangkan jalur Bordes & pagar pengaman untuk perbaikan Hoist KBB1 dan KBB 2.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'NANAG M', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7214', 'HSE', 'B', '-', '', ''),
(285, 'EFS/001/XII/23', '0000-00-00', 'EFS', 'Bongkar dan pasang plat lantai pintu utama.', '-', 'Mekanik', '-', '-', '-', '-', '-', '5', 'KARSITA', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7227', 'DLL', 'B', '-', '', ''),
(286, '2/GHE/XII/23', '0000-00-00', 'GHE', 'Mohon di buatkan penutup pengaman pipa buang ( 8 )di separator oli Plant-K.', '-', 'Mekanik', '-', '-', '-', '-', '-', '8', 'ANTON', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7195', 'HSE', 'B', '-', '', ''),
(287, '125/MCG/XII/23', '0000-00-00', 'MCG', 'Mohon di ganti dan di pasangkan Elbow pipa HDPE air RO di area MCG.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7185', 'DLL', 'A', '-', '', ''),
(288, '128/MCG/XII/23', '0000-00-00', 'MCG', 'Mohon di perbaiki fire alarm MCG No. 09, 10 dan 11.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7191', 'HSE', 'A', '-', '', ''),
(289, '127/MCG/XII/23', '0000-00-00', 'MCG', 'Mohon di buatkan dan di pasangkan cover untuk pintu Basement carbon feeding 2, 3 & 4.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7194', 'HSE', 'B', 'Workshop', '', ''),
(290, '036/MCD/XI/23', '0000-00-00', 'MCD', 'Mohon di perbaiki lantai area loading compound MCD atas.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'RISKY', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7200', 'HSE', 'A', '-', '', ''),
(291, '114/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di pasangkan besi pembatas dinding pada area storage carbon dekat CF 4.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7202', 'HSE', 'A', '-', '', ''),
(292, '98800/124/7/23', '0000-00-00', 'MCG', 'Mohon di lakukan pekerjaan sbb : Pemasangan mesin mixer MCD 8 berikut dengan assesoriesnya ( MEP ) CEP : 12020019022019NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7207', 'INM', 'C', '-', '', ''),
(293, '98800/126/7/23', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan sbb : Pemasangan mesin Bach Off MCD 8 berikut dengan assesoriesnya ( MEP ) CEP : 12020019022019NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7208', 'INM', 'C', '-', '', ''),
(294, '98800/125/7/23', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan sbb : Pemasangan mesin Open Mill MCD 8 berikut assesoriesnya ( MEP ). CEP : 12020019022019NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7209', 'INM', 'C', '-', '', ''),
(295, '131/MCG/XII/23', '0000-00-00', 'MCG', 'Mohon di buatkan tutup plat besi Bordes pada area got parkiran motor bawah jembatan layang MCG.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7212', 'HSE', 'A', 'Civil Work', '', ''),
(296, '132/MCG/XII/23', '0000-00-00', 'MCG', 'Mohon di buatkan tutup plat besi bordes pada area got tempat cuci forklif.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7218', 'HSE', 'A', '-', '', ''),
(297, '98800/220/12/23', '0000-00-00', 'MCA', 'Mohon di lakukan pekerjaan sbb : Konversi motor DC to AC mesin TSR MCA-8. CEP : 11080110922008NA.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7220', 'MD', 'A', '-', '', ''),
(298, '98800/127/7/23', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan sbb : Pemasangan New Cargo Lift Cap : 5 Ton area MCD. CEP : 12020019022019NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7221', 'MT', 'C', '-', '', ''),
(299, '98800/219/12/23', '0000-00-00', 'MCA', 'Mohon di lakukan pekerjaan sbb : Pemasangan mesin Mixer MCA-8 berikut dengan Assesoriesnya (MEP) CE{ : 11080110922008NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7222', 'INM', 'C', '-', '', ''),
(300, '069/MCA/XII/23', '0000-00-00', 'MCA', 'Mohon di lakukan pemasangan plat lantai untuk area antara tiang F11 sampai F12 dasaran sebelum di pasang plat minta di lapisi semen.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DODI A', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7231', 'DLL', 'B', 'Civil Work', '', ''),
(301, '272/JMW/XII/23', '0000-00-00', 'JMW', 'Pemasangan fire alarm di gudang ARM 17 sebanyak 6 titik. Note : Hasil temuan patrol HSE TBR.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'ARON G', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7197', 'HSE', 'B', '-', '', ''),
(302, '02/safety-TBR/XII/23', '0000-00-00', 'HSE', 'Mohon di buatkan support/kabel tray pada instalasi kabel gudang softex sampai pos security softex.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'TAUFIK K', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7211', 'HSE', 'A', '-', '', ''),
(303, '98800/224/12/23', '0000-00-00', 'RTB', 'Mohon bantuannya untuk pemindahan emergency fire alarm di area kantor Building lama ke tiang bangunan TBR No.A.28. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7216', 'HSE', 'B', '-', '', ''),
(304, '98800/223/12/23', '0000-00-00', 'RFI', 'Mohon di lakukan pemasangan/pengawasan weighing scale dan conveyor input X-Ray TBR mekanik, elektrik dan assesoriesnya. CEP : 11080111022003NA.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7217', 'B', 'QN', '-', '', ''),
(305, '98800/222/12/23', '0000-00-00', 'TTE', 'Mohon di lakukan pekerjaan pemindahan dan pemasangan OM 22 Ex. Plant-B di Plant-T beserta  assesoriesnya ( MEP ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '11', 'SUPRIYADI', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7219', 'MD', 'B', '-', '', ''),
(306, 'JLB/082/XII/23', '0000-00-00', 'JLB', 'Pemasangan baru MCB 2 pcs untuk power AC 8PK 2 unit di ADT 7 Laborat A Plant-A. M&R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'FIKHRI F', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7187', 'QN', 'A', '-', '', ''),
(307, 'JLB/084/XII/23', '0000-00-00', 'JLB', 'Penyambungan kabel lampu penerangan ruang mesin ADT-5 Laborat-A.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'FIKHRI F', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7205', 'HSE', 'A', '-', '', ''),
(308, 'BBC/308/XII/23', '0000-00-00', 'BBC', 'Mohon di pasangkan modifikasi wind up (penambahan accumulator dan transwell) mesin BBC 04 Qty : 1 mesin.  M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'BUDY A', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7183', 'MD', 'B', '-', '', ''),
(309, 'BTD/140/BB/XII/23', '0000-00-00', 'BTD', 'Mohon bantuannya untuk pemasangan modifikasi winding roll pada mesin baru ITE.03.01. M&R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'SETYO', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7186', 'MD', 'B', 'Workshop', '', ''),
(310, 'DTC/59/XII/23', '0000-00-00', 'DTC', 'Mohon untuk di pindahkan tempat stop kontak charger accu linde dari DBL ke area DGP 8. M&R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'SUPENDI', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7188', 'DLL', 'A', '-', '', ''),
(311, '245/JMW/XI/23', '0000-00-00', 'JMW', 'Perbaikan pagar pembatas loading dock rusak lokasi gudang ARM 5.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'APRIAL', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7201', 'HSE', 'A', '-', '', ''),
(312, 'DTL/002/12/23', '0000-00-00', 'DTL', 'Peremajaan instalasi area charge linde (satu MCB, satu Stop kontak ) 1 MCB x 1 Adaptor. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'CHAERUL', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7215', 'DLL', 'A', '-', '', ''),
(313, '98800/221/12/23', '0000-00-00', 'KTC', 'Mohon di lakukan penarikan kabel power dan pengadaan panel power tambahan untuk mesin KMC 01-03.', '-', 'Elektrik', '-', '-', '-', '-', '-', '8', 'YUHARKAT', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7193', 'SP', 'A', '-', '', ''),
(314, '113/MCG/XI/23', '0000-00-00', 'MCG', 'Mohon di perbaiki pipa air bocor di area Chiller MCG-1.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7182', 'DLL', 'A', '-', '', ''),
(315, '129/MCG/XII/23', '0000-00-00', 'MCG', 'Mohon di buatkan besi pengaman di area loading bawah MCG, seperti contoh yang sudah terpasang.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7192', 'HSE', 'A', '-', '', ''),
(316, '037/MCD/XII/23', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan sbb : 1. Pemindahan belt feeder metal detector area MCD-7 atas ke area compound seleksi bawah.  2. Pemindahan belt feeder area compound seleksi bawah ke area MCD-7 atas.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7228', 'MD', 'B', '-', '', ''),
(317, 'RFH/01/12/23', '0000-00-00', 'RFH', 'Mohon untuk di lakukan modifikasi pada pipa pembuangan blow down di area luar dekat RTE-Ex 3 karena tetesan airnya mengenai tangga dan menyebabkan tangga menjadi licin.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'MAMAN S', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7190', 'HSE', 'A', '-', '', ''),
(318, '242/JMW/XI/23', '0000-00-00', 'JMW', 'Mohon untuk di pindahkan hand rell Ex.Landasan forklif di ARM 17 di pasang ke Landasan Forklif ARM 5.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'ARON G', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7199', 'DLL', 'A', '-', '', ''),
(319, 'RSC/004/11/23', '0000-00-00', 'RSC', 'Mohon untuk dapat di pasangkan plat pada lantai RSC-BC3 6mm. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'YOGA R', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7213', 'QN', 'A', '-', '', ''),
(320, '290/JMW/XII/23', '0000-00-00', 'JMW', 'Mohon untuk di cek dan di perbaiki lampu yang konslet (keluar percikan api ) lokasi gudang ARM-17.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'ARON G', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7223', 'HSE', 'A', '-', '', ''),
(321, 'GDP/JO056/MIS/ITF/XII/23', '0000-00-00', 'GDP', 'Penyambungan (koneksi) kabel listrik untuk power Box panel CCTV BOD (area Softex TBR dan Plant-T ).', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'EDY S', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7224', 'DLL', 'B', '-', '', ''),
(322, 'R/RPW/34/12/23', '0000-00-00', 'RPW', 'Perbaikan lampu Emergency (lampu jalur evakuasi) yang rusak (tidak menyala) di gudang ban R02 (RPW 02) Jumlah : 1 titik.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'DANANG', 0, 0, 0, 0, 0, '0000-00-00', '5', 'J-7232', 'DLL', 'A', '-', '', ''),
(323, '380100/128/VIII/23', '0000-00-00', 'GSR', 'Perbaikan gerbang tandon, rusak karena remote tidak berfungsi.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'EKAN J', 0, 0, 0, 0, 0, '2023-11-09', '5', 'J-6954', 'DLL', 'B', '-', '', ''),
(324, 'JLB/087/XII/23', '0000-00-00', 'JLB', 'Pembuatan dan pemasangan pagar panel kontrol mesin ADT-1. Warna pagar : kuning. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'ANRI AM', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7235', 'HSE', 'A', '-', '', ''),
(325, 'JLB/003/I/24', '0000-00-00', 'JLB', 'Pembongkaran blower dan cerobong di ruang ADT-3 Laborat-A. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'FIKHRI', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7262', 'DLL', 'A', '-', '', ''),
(326, 'ASQ/001/01/24', '0000-00-00', 'ASQ', 'Mohon di pasangkan compound separator untuk calender mesin ASQ-1. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'KARSONO', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7289', 'HSE', 'A', '-', '', ''),
(327, 'A/APW/2024/01/0002', '0000-00-00', 'APW', 'Mohon di potongkan besi penyangga sebanyak 3 titik dan mohon di perbaiki posisi besi penyangga yang bengkok di area pintu 3,4 dan 5 di APW 1. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'FEBRY', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7291', 'HSE', 'B', '-', '', ''),
(328, '02/NKP/I/24', '0000-00-00', 'GSC', 'Perapihan instalasi listrik depan kantor Estate Housekeping.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ANGGA', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7293', 'DLL', 'A', '-', '', ''),
(329, '05/GRM/I/24', '0000-00-00', 'GRM', 'Penarikan kabel untuk pemasangan kompressor kantor dept.Ekpedisi area Gudang APW 3.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'HARRY P', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7302', 'DLL', 'A', '-', '', ''),
(330, 'JWS/002/I/24', '0000-00-00', 'JWS', 'Mohon bantuannya untuk di lakukan : Pembuatan dudukan dan pemasangan kipas blower pada tembok workshop 2 sebanyak 3 unit.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ACH DWI', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7304', 'HSE', 'A', '-', '', ''),
(331, 'DPW/002/01/24', '0000-00-00', 'DPW', 'Mohon pengadaan dan pemasangan 2 bh lampu penerangan tembak di area Gudang Bassko A.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'A ERFAN', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7314', 'HSE', 'A', '-', '', ''),
(332, '018/JMW/I/24', '0000-00-00', 'JMW', 'Mohon untuk di buatkan besi rongga untuk injakan pada sela anrea cuci tangan samping TPS B3 Plant-A.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'NUGI W', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7316', 'HSE', 'A', '-', '', ''),
(333, 'A/APW/2024/01/0005', '0000-00-00', 'APW', 'Mohon di ganti dan di pasangkan Box Hydrant di APW 2 di sebabkan Box Hydrant keropos sehingga pintu copot/lepas ( lokasi hydrant H-45 dekat jalan utama arah ke RPW 2 ). M & r.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'FEBRY', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7318', 'HSE', 'A', '-', '', ''),
(334, 'JLB/086/XII/23', '0000-00-00', 'JLB', 'Pemasangan lampu 2 titik dan stop kontak 1 titik di ruang ADT-1.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ANRI AM', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7233', 'HSE', 'A', '-', '', ''),
(335, 'JLB/004/I/24', '0000-00-00', 'JLB', 'Support project scrap mesin ADT-3 di Laborat-A. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'FIKHRI', 0, 0, 0, 0, 0, '2024-01-25', '5', '7263', 'SPC', 'B', '-', '', ''),
(336, '001/JO/GAD/I/24', '0000-00-00', 'GAD', 'Pemasangan / instalasi mesin kompressor angin baru pool kendaraan.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'ANTON S', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7234', 'DLL', 'A', '-', '', ''),
(337, '640500-24/I/004', '0000-00-00', 'BFI', 'Mohon di bongkar dan di pindahkan mesin Vacum 3 unit dan instalasi mekanik & listrik ( Project pemindahan line OE ke 2nd floor ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'WAHYUDIN', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7237', 'SPC', 'B', '-', '', ''),
(338, '640500-24/I/003', '0000-00-00', 'BFI', 'Mohon di bongkar mesin inspeksi OE 1 (bawah) 4 unit dan instalasi mekanik dan listrik.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'WAHYUDIN', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7239', 'DLL', 'A', '-', '', ''),
(339, '640500-24/I/002', '0000-00-00', 'BFI', 'Mohon di pasangkan meja inspeksi baru 4 unit dan instalasi mekanik dan listrik.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'WAHYUDIN', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7240', 'SP', 'A', '-', '', ''),
(340, 'BTD/013/WP/I/24', '0000-00-00', 'BTD', 'Mohon di pasangkan grafity Roller untuk ITE 03.01.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'MABRURI', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7288', 'MD', 'A', '-', '', ''),
(341, 'BPW/09/I/24', '0000-00-00', 'BPW', 'Mohon di orderkan dan di pasangkan 1 bh kipas blower dan stop kontak mesin strapping  sebanyak 3 bh untuk di area mesin strapping Gudang Ban B BPW 1.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7295', 'DLL', 'A', '-', '', ''),
(342, 'BPW/07/I/24', '0000-00-00', 'BPW', 'Mohon agar dapat di tambahkan saklar fire alarm sebanyak 1 bh di Gudang Ban B APW 3 Note : Temuan patrol HSE.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7300', 'HSE', 'A', '-', '', ''),
(343, 'BFS/015/I/24', '0000-00-00', 'BFS', 'Mohon untuk : -. Penambahan pemasangan lampu penerangan di area  -. Parkiran Plant-B & I \'-. Rest area Plant-B.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'ARIEF S', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7322', 'HSE', 'A', '-', '', ''),
(344, '640500-24/I/001', '0000-00-00', 'BFI', 'Mohon di bongkar ram wermes OE 2 (atas) 3 ruang. Instalasi mekanik dan Listrik.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'WAHYUDIN', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7236', 'DLL', 'A', '-', '', ''),
(345, 'CBM/59/XII/23', '0000-00-00', 'CBM', 'Penggantian dan pemasangan pintu gerbang belakang mixing Plant-C.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'ASEP M', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7282', 'HSE', 'C', '-', '', ''),
(346, 'CFX/01/01/24', '0000-00-00', 'CFX', 'Mohon dapat di lakukan pemasangan penutup selokan menggunakan besi kawat ram seperti pada contoh gbr.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'PAINO', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7283', 'HSE', 'B', '-', '', ''),
(347, 'CXE/06/I/24', '0000-00-00', 'CXE', 'Mohon bantuannya untuk pemasangan conveyor dari OM CXE-1 ke OM CXE-3.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDIN', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7286', 'SP', 'B', '-', '', ''),
(348, 'CXE/05/I/24', '0000-00-00', 'CXE', 'Mohon bantuannya untuk pemasangan pompa celup Groundfos di section Extruder.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'SYAMSUDIN', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7296', 'DLL', 'B', '-', '', ''),
(349, '98800/035/01/24', '0000-00-00', 'CBM', 'Mohon di lakukan pekerjaan Supervisi pemasngan 1 unit New Dust Collector Banbury CBM Plant-C (Ex. PT. Hebron )  -. Connect pipa angin  -. Setting dan las baut angkur  -. Connect kabel power.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '3', 'ENTIS S', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7313', 'SPC', 'C', '-', '', ''),
(350, '641100-23/XII/009', '0000-00-00', 'HFI', 'Mohon di pasangkan atap/kanopi di area pintu belakang Plant-H.', '-', 'Mekanik', '-', '-', '-', '-', '-', '6', 'M HAMID A', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7244', 'DLL', 'A', 'Civil Work', '', ''),
(351, '98800/031/01/24', '0000-00-00', 'HBC', 'Mohon di lakukan pekerjaan pemasangan 1 unit cold feed extruder 01 (ex. ITL 03.01) dari Plant-I ke Plant-H (Replacement OM HSQ 01.01) mekanik, elektrik beserta infrastrukturnya & assesories.M&R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '6', 'SUPRIYADI', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7299', 'INM', 'C', '-', '', ''),
(352, '641100-24/I/001', '0000-00-00', 'HFI', 'Mohon di pindahkan meja cek repair 09 ke sebelah meja cek 01 yang ada di area FI tire Plant-H.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '6', 'M HAMID A', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7303', 'MD', 'A', '-', '', ''),
(353, 'BQA/001/I/24', '0000-00-00', 'BQA', 'Pemasangan/instalasi lampu baru pada area kerja QAMC product inspection yang berlokasi di Gudang BPW1 lantai 2 ( Plant I ) sebanyak 2 bh tolong di orderkan lampu serupa.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'ADHIGUNA', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7250', 'SP', 'A', '-', '', ''),
(354, '98800/02/I/24', '0000-00-00', 'ITC', 'Mohon di lakukan pekerjaan pemasangan kran, Extend main pipe bawah dan piping main line over Head Curing ITC line 1-2. CEP : 14060010223012NA.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'SUPRIYADI', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7255', 'SPC', 'C', '-', '', ''),
(355, '98800/03/I/24', '0000-00-00', 'ITC', 'Mohon di lakukan pekerjaan pemasangan mesin New Tire Curing auto ITC line 1-2 beserta assesoriesnya ( MEP ) sebanyak 10 units. CEP : 14060010223012NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'SUPRIYADI', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7256', 'INM', 'C', '-', '', ''),
(356, 'DPW/001/01/24', '0000-00-00', 'DPW', 'Mohon pemindahan 2 unit mesin compressor dari Gudang DPW ke Gudang Bassko u/ support pengiriman ( dampak renovasi Gudang DPW 3 ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'A ERFAN', 0, 0, 0, 0, 0, '2024-01-31', '5', 'J-7284', 'SP', 'A', '-', '', ''),
(357, '98800/044/01/24', '0000-00-00', 'BBC', 'Mohon di lakukan pekerjaan sbb : -. Pembongkaran OM 18 Squege  ex. ITL 01 SQ 01 dan ITL 01 SQ 03  \'-. Pemindahan dan pemasangan OM 18 dan mesin Squege ex. ITL 01 SQ 01 - ITL 01 SQ 03 di Plant-B Beserta aasesoriesnya ( MEP ). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'SUPRIYADI', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7290', 'MD', 'B', 'Civil Work', '', ''),
(358, 'IMC/014/I/24', '0000-00-00', 'IMC', 'Mohon di lakukan pekerjaan : Pengorderan dan pemasangan center lamp sebanyak 1 unit untuk support pemasangan barcode luar ( Double Barcode ) pada mesin BTU 04.06 Departement Building Tire Plant-I. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'A.MUSHLIH', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7301', 'SP', 'A', '-', '', ''),
(359, 'BQA/B-002/I/24', '0000-00-00', 'BQA', 'Pemindahan kipas angin gantung ( wall fan ) dari area E48 ke F51 lantai 2 BPW 1 ( Gudang Plant-I ) dan Instalasi stop kontak baru untuk PC dan Dispenser di area F51.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'ADHIGUNA', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7315', 'DLL', 'A', '-', '', ''),
(360, 'ITC/022/XII/23', '0000-00-00', 'ITC', 'Mohon di lakukan perbaikan lantai tutup saluran air rusak harap menggunakan plat sesuai ganbar rata dan rapi di tiang C31 Line 05 dan 06 ITC untuk Curing Tire Plant-I. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '7', 'DWI S', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7317', 'HSE', 'A', 'Civil Work', '', ''),
(361, 'IBC/004/I/24', '0000-00-00', 'IBC', 'Mohon di modifikasi dan di pasangkan wind up IBC.06.01 dari 2 wind up menjadi 4 wind up. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'ROMLI S', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7265', 'SP', 'B', '-', '', ''),
(362, '98800/006/01/24', '0000-00-00', 'DTL', 'Mohon bantuannya untuk di pasangkan let off unit untuk DTLPA 2 Ex. Taihe ( elektrik & mekanik ) ( 2 station ). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7243', 'MD', 'B', '-', '', ''),
(363, '98800/004/01/24', '0000-00-00', 'DTE', 'Mohon bantuannya untuk di pasangkan centering wind up DTE 4 Ex. Taihe ( elektrik dan mekanik ).M&R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7245', 'MD', 'A', '-', '', ''),
(364, '98800/024/01/24', '0000-00-00', 'DTL', 'Mohon bantuannya untuk di lakukan pemasangan mesin new iner liner two roll head extruder ( elektrik dan mekanik ) CEP : 12020019022010NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7266', 'INM', 'B', '-', '', ''),
(365, '98800/021/01/24', '0000-00-00', 'DFI', 'Mohon di lakukan pemasangan conveyor transfer untuk supply ke DPW 1 ( elektrikal, mekanikal ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7267', 'MT', 'B', '-', '', ''),
(366, '98800/018/01/24', '0000-00-00', 'DFI', 'Mohon di lakukan pekerjaan pemindahan mesin grinding Matteuzi sebanyak 1 set ke area DPW 1 beserta  assesoriesnya ( mekanik, elektrik, piping, lighting ETC ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7268', 'MD', 'B', '-', '', ''),
(367, '98800/016/01/24', '0000-00-00', 'DFI', 'Mohon di lakukan pekerjaan pembongkaran dan penyimpanan mesin KUF/KDB 2,3,6,7 di area APW-2 ( 4 mesin )', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7270', 'DLL', 'A', '-', '', '');
INSERT INTO `pengajuan_job_order` (`id`, `no_jo`, `tgl_jo`, `cc_no`, `pekerjaan`, `tujuan`, `pelaksana`, `rencana`, `cep_no`, `lampiran`, `dwg_no`, `mesin_no`, `id_plant`, `id_pemesan`, `id_depthead`, `id_planthead`, `id_factoryhead`, `id_eng_depthead`, `id_penerima`, `tgl_terima`, `status`, `no_file`, `klasifikasi`, `golongan`, `departemen_lain`, `saran_dept`, `saran_plant`) VALUES
(368, '98800/015/01/24', '0000-00-00', 'DFI', 'Mohon di lakukan pekerjaan pemindahan mesin KUF/KDB 1,4,5 ke area DPW 1 beserta assesoriesnya ( mekanik, elektrik, piping, lighting ETC ). 3 mesin.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7271', 'MD', 'B', '-', '', ''),
(369, '98800/023/01/24', '0000-00-00', 'DTL', 'Mohon bantuannya untuk di relokasi mesin DBEC ( elektrik & mekanik ) untuk project inner liner. CEP : 12020019022010NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7272', 'SPC', 'B', '-', '', ''),
(370, '98800/022/01/24', '0000-00-00', 'DTL', 'Mohon bantuannya untuk di relokasi mesin DTLPA dan Hoistnya  ( elektrik & mekanik ) untuk project  inner liner.  CEP : 12020019022010NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7273', 'SPC', 'B', '-', '', ''),
(371, 'DTD/0005/01/24', '0000-00-00', 'DMC', 'Pemasangan kipas angin Exhaust pada ruang coating silicone di area DBL.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'INDRAWAN', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7274', 'DLL', 'A', 'Civil Work', '', ''),
(372, '98800/030/01/24', '0000-00-00', 'DRB', 'Mohon bantuannya untuk di lakukan modifikasi lifetr (reposisi) pada Hanging conveyor DGP-1 DRB S4 SB ( elektrik & mekanik ) sesuai gambar. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7277', 'MD', 'B', '-', '', ''),
(373, '012/JMW/I/24', '0000-00-00', 'JMW', 'Perbaikan plat besi rel pintu Gudang Basko/ARM 15.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'ARON G', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7279', 'HSE', 'A', 'Civil Work', '', ''),
(374, 'DTD-0027-01-24', '0000-00-00', 'DTD', 'Mohon di support aktifitas di workshop Technical Diesmen sbb : -. Instalasi lamp support di mesin CNC- Argo  -. Pemindahan saklar lampu  -. Pelepasan stop kontak.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'ALFIAN', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7307', 'DLL', 'A', '-', '', ''),
(375, '98800/019/01/24', '0000-00-00', 'DPW', 'Mohon di lakukan pekerjaan renovasi DPW 3 ( civil, struktur, elektrikal dan mekanikal ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-24', '5', 'J-7238', 'MT', 'C', 'Civil Work', '', ''),
(376, '98800/007/01/24', '0000-00-00', 'KTL', 'Mohon bantuannya untuk di pasangkan let off unit untuk KTL PA 1 Ex. Taihe ( elektrik & mekanik )M&R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '8', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-05', '5', 'J-7242', 'INM', 'B', '-', '', ''),
(377, '98800/020/01/24', '0000-00-00', 'DPW', 'Mohon di lakukan pekerjaan pemindahan dan pembongkaran mesin wrapping sebanyak 7 set ( mesin no. 1, 2,8,9,10,11,12 ) ( mekanik, elektrik, piping ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-24', '5', 'J-7241', 'MD', 'B', '-', '', ''),
(378, '98800/008/01/24', '0000-00-00', 'DTE', 'Mohon bantuannya untuk di pasangkan online profilometer DTE 3 Ex.Taihe ( elek & mek ) M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-24', '5', 'J-7247', 'QN', 'A', '-', '', ''),
(379, '98800/009/01/24', '0000-00-00', 'DTE', 'Mohon bantuannya untuk di pasangkan modifikasi wind up DSW 1 Ex.Taihe ( elek & mek ) M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-24', '5', 'J-7248', 'QN', 'B', '-', '', ''),
(380, '98800/017/01/24', '0000-00-00', 'DFI', 'Mohon di lakukan pekerjaan pemindahan mesin tire fixer sebanyak 4 set ke area DPW 1 beserta assesoriesnya ( mekanik, elektrik, piping, lighting ETC ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-24', '5', 'J-7269', 'MD', 'B', '-', '', ''),
(381, '003/GRM/I/24', '0000-00-00', 'GRM', 'Pemasangan stop kontak dan box panel di area TPS Plant-D.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'AGUS S', 0, 0, 0, 0, 0, '2024-01-24', '5', 'J-7278', 'DLL', 'A', '-', '', ''),
(382, '98800/005/01/24', '0000-00-00', 'KTE', 'Mohon bantuannya untuk di pasangkan centering wind up KSW 1 Ex. Taihe ( elek & mek ). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '8', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-24', '5', 'J-7246', 'SPC', 'A', '-', '', ''),
(383, '01/DFI-JO/I/24', '0000-00-00', 'DFI', 'Mohon di pindahkan panel penerangan yang konslet akibat terkena kebocoran talang air di area Plant-K ( KUF 03 )', '-', 'Elektrik', '-', '-', '-', '-', '-', '8', 'SOPYAN S', 0, 0, 0, 0, 0, '2024-01-24', '5', 'J-7260', 'HSE', 'A', '-', '', ''),
(384, '002/MCG/I/24', '0000-00-00', 'MCG', 'Mohon di pasang MCFA paging system fire alarm di area MCG. CEP : 50030010923001BA', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7253', 'HSE', 'B', '-', '', ''),
(385, '003/MCG/I/24', '0000-00-00', 'MCG', 'Mohon di lakukan pengorderan dan pemasangan lampu area MCG-5, MCG-6, MCG-7 atas yang sudah mulai menguning ( 54 pcs ).', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7254', 'HSE', 'B', '-', '', ''),
(386, '98800/27/01/24', '0000-00-00', 'MCA', 'Mohon di lakukan modifikasi oil feeding MCA reposisi tangki dan perbaikan jalur buangan air steam trap.  CEP : 12020019024011BA.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7261', 'MD', 'B', '-', '', ''),
(387, '008/MCA/I/24', '0000-00-00', 'MCA', 'Mohon di pindahkan pipa pendingin mixer MCA 7. Note : Terkena esspansi MCA 8.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DEDI A', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7294', 'MD', 'A', '-', '', ''),
(388, '002/MFS/II/24', '0000-00-00', 'MFS', 'Mohon di pasangkan stop kontak di area depan carbon feeding untuk power switch POE CCTV area Produksi MCA.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'NIZFAN', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7308', 'DLL', 'A', '-', '', ''),
(389, '98800/037/01/24', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan sbb : Pemasangan timbangan compound MCD 1 berikut assesoriesnya. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7309', 'QN', 'A', '-', '', ''),
(390, '98800/038/01/24', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan sbb : Pemasangan timbangan compound MCD 7 berikut assesoriesnya. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7310', 'QN', 'A', '-', '', ''),
(391, '98800/040/01/24', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan sbb : Pemasangan timbangan compound MCA 5 berikut assesoriesnya. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7311', 'QN', 'A', '-', '', ''),
(392, '98800/039/01/24', '0000-00-00', 'MCD', 'Mohon di lakukan pekerjaan sbb : Pemasangan timbangan compound MCA 3 berikut assesoriesnya. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7312', 'QN', 'A', '-', '', ''),
(393, '98800/048/02/24', '0000-00-00', 'MCA', 'Mohon di lakukan pekerjaan sbb : Relokasi Box Hydrant terdampak kolom Hoist MCA 7 - MCA 8.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7320', 'MD', 'A', '-', '', ''),
(394, '012/MCG/I/24', '0000-00-00', 'MCG', 'Mohon di perbaiki tabung pemanas air kamar mandi MCG 17 bocor.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7321', 'DLL', 'A', '-', '', ''),
(395, '004/MCA/I/24', '0000-00-00', 'MCA', 'Mohon di lakukan perbaikan pada body casing elevator 2 bawah.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DEDI A', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7251', 'HSE', 'A', '-', '', ''),
(396, '035/MCD/XI/23', '0000-00-00', 'MCD', 'Mohon di buatkan pagar pembatas penyimpanan pallet di dalam elevator MCD.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'HANDY K', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7257', 'DLL', 'A', '-', '', ''),
(397, '98800/028/01/24', '0000-00-00', 'MCI', 'Mohon di lakukan modifikasi hoper OM MCI 3 terkait Isue Compound nyangkut. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7276', 'MD', 'B', '-', '', ''),
(398, '98800/025/01/24', '0000-00-00', 'MCD', 'Mohon di lakukan pembongkaran Ducting dan Ladder deck Ex.Blower air Fresher MCD terdampak Renovasi kamar mandi.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7280', 'HSE', 'B', '-', '', ''),
(399, '007/MCG/I/24', '0000-00-00', 'MCG', 'Mohon di buatkan tutup got di area : -. Samping elevator 2 bawah  -. MCG 7 bawah.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7281', 'HSE', 'A', '-', '', ''),
(400, '007/MCA/I/24', '0000-00-00', 'MCA', 'Mohon di buatkan pagar pengaman area belakang mixer MCA 9.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DEDI A', 0, 0, 0, 0, 0, '2024-02-24', '5', 'J-7297', 'HSE', 'A', '-', '', ''),
(401, 'R/RPW/35/12/23', '0000-00-00', 'RPW', 'Pembuatan plat jaring untuk penutup selokan dekat smoking area, Gudang Ban R01.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'DANANG', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7252', 'HSE', 'A', '-', '', ''),
(402, 'JBW/011/01/24', '0000-00-00', 'JBW', 'Mohon di bantu pembuatan rak sparepart di central storage Ex.Softex.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'ALI', 0, 0, 0, 0, 0, '2024-01-15', '5', 'J-7258', 'DLL', 'B', 'Workshop', '', ''),
(403, '01/NSR/I/24', '0000-00-00', 'GSC', 'Perbaikan instalasi listrik di area kandang sapi.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'SAENAL', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7292', 'DLL', 'A', '-', '', ''),
(404, 'R/RPW/02/01/24', '0000-00-00', 'RPW', 'Penambahan besi penahan pagar pembatas antara Gudang Ban R ( RPW 01 ) dengan Final Inspeksi ( FI ) ukuran : 7mx2', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'JOKO P', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7298', 'HSE', 'B', '-', '', ''),
(405, '380100/203/I/24', '0000-00-00', 'GSR', 'Perbaikan lampu penerangan jalan utama ( PJU ) di area GI 1.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'EKAN J', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7305', 'HSE', 'A', '-', '', ''),
(406, '380100/206/I/24', '0000-00-00', 'GSR', 'Perbaikan kabel di pos TPS.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'EKAN J', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7306', 'HSE', 'A', '-', '', ''),
(407, 'RBG/001/01/24', '0000-00-00', 'RBG', 'Mohon untuk di pasangkan plat besi pada lantai area let off RBG-BG1 (mengalokasikan plat sisa RSC-SC1)', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'YOGA R', 0, 0, 0, 0, 0, '2024-02-09', '5', 'J-7319', 'DLL', 'B', 'Civil Work', '', ''),
(408, 'JBW/010/01/24', '0000-00-00', 'JBW', 'Mohon di bantu renovasi central storage Ex.Softex.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'ALI', 0, 0, 0, 0, 0, '2024-01-23', '5', 'J-7259', 'DLL', 'C', 'Civil Work', '', ''),
(409, 'PE-R/005/01/24', '0000-00-00', 'JQA', 'Mohon di pasangkan kabel 3 Phase dari SDB 5.5 ke mesin RQA-A11 (RQA Appearana)', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'RIZKI', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7264', 'QN', 'A', '-', '', ''),
(410, 'R/RPW/01/01/24', '0000-00-00', 'RPW', 'Pemindahan kipas angin dari taing D25 ke E25 dan dari tiang C30 ke C28 di Gudang RPW 2.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'DANANG', 0, 0, 0, 0, 0, '2024-01-25', '5', 'J-7275', 'DLL', 'A', '-', '', ''),
(411, 'GDP/J005/MIS/ITF/I/24', '0000-00-00', 'GDP', 'Koneksi listrik ke panel CCTV di pos Gardu Induk.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'EDY S', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7287', 'HSE', 'A', '-', '', ''),
(412, 'TFH/001/01/24', '0000-00-00', 'TFH', 'Penarikan LAN kabel untuk system Barcode Plant-T 3 titik PC monitor (deadline running barcoce) 10 titik PC industri , awal Februari 5 titik printer XC-gate.', '-', 'Elektrik', '-', '-', '-', '-', '-', '11', 'ARIF', 0, 0, 0, 0, 0, '2024-02-01', '5', 'J-7285', 'DLL', 'A', '-', '', ''),
(413, '98800/054/02/24', '0000-00-00', 'JLAB', 'Mohon bantuannya untuk melakukan pekerjaan sbb :  -. Pembongkaran tire changer existing -. Pemasangan tire changer baru beserta jalur angin dan buangan serta pekerjaan elektriknya  -.Pembuatan pagar untuk mesin plunger  -.Pemindahan dan modifikasi Hoist t', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ENTIS S.', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7323', 'SPC', 'C', '-', '', ''),
(414, 'ATC/01/02/24', '0000-00-00', 'ATC', 'Modifikasi PCI (body frame PCI di naikkan 50mm) mesin ATC-K06 & K07 BOM 48P. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'JAYADI', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7324', 'MD', 'B', '-', '', ''),
(415, '004/JO/GAD/II/24', '0000-00-00', 'GAD', 'Penggantian lampu mercury menjadi lampu Hight Bay LED 80 watt di area pool kendaraan sebanyak 25 pcs.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ANTON S', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7327', 'MD', 'A', '-', '', ''),
(416, '98800/053/02/24', '0000-00-00', 'ATB', 'Mohon bantuannya untuk melakukan pembuatan jalur blow down untuk mesin Building Samson F-0 dan penggantian air filter pada tangki angin. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'ENTIS S.', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7329', 'MD', 'A', '-', '', ''),
(417, 'ATB/002/II/24', '0000-00-00', 'ATB', 'Mohon di buatkan blow down untuk mesin ATB-F0 dan BB-51. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'RAYMON', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7331', 'MD', 'A', '-', '', ''),
(418, '004/GA-JO/II/24', '0000-00-00', 'GA', 'Penggantian 4 bh tutup saluran air area jembatan timbang.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'ZAENAL A.', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7349', 'DLL', 'A', '-', '', ''),
(419, 'JLB/011/II/24', '0000-00-00', 'JLB', 'Support pemasangan dan penambahan sensor tempereature mesin ADT-6 dan ADT-7 Laboratorium A.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ANRI AM', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J=7368', 'QN', 'A', '-', '', ''),
(420, 'JLB/012/II/24', '0000-00-00', 'JLB', 'Pembongkaran dan pemasangan out put ( dari output kecil ke besar ) Exhaust. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'EJA AM', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7379', 'HSE', 'A', '-', '', ''),
(421, '044/JMW/II/24', '0000-00-00', 'JMW', 'Mohon untuk di pasangkan lampu di gedung D serta pemindahan saklar lampu ke panel di belakang area loading.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'ARON G', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7374', 'DLL', 'A', '-', '', ''),
(422, '04/GRM/I/24', '0000-00-00', 'GRM', 'Pemasangan Hydrant baru TPS Pool kendaraan lokasi tempat pemasangan terlampir.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'HARRY P', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7354', 'HSE', 'B', '-', '', ''),
(423, '641100-24/II/001', '0000-00-00', 'BFI', 'Mohon di geser pagar dan kanal ? 1 meter ke depan area booking OE FI Tire Plant-B.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'M.HAMID', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7372', 'DLL', 'A', '-', '', ''),
(424, 'BPW/07/II/24', '0000-00-00', 'BPW', 'Mohon di buatkan dan di pasangkan pagar dan pintu wiremesh di area penerimaan produksi Plant-H.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'A RASID', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J=7375', 'DLL', 'B', '-', '', ''),
(425, 'HTC/031/II/24', '0000-00-00', 'HTC', 'Mohon di lakukan pemindahan mesin angin repair curing HTC. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '6', 'SETYO W.', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J=7350', 'MD', 'A', '-', '', ''),
(426, 'HTE/048/II/24', '0000-00-00', 'HTE', 'Mohon di orderkan dan di pasangkan -.Plat expand metal Galvanis tebal 5mm  -. Ukuran : P 20mtr x L 70cm untuk menutup selokan Plant-H. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '6', 'BUDY A.', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J=7380', 'HSE', 'A', '-', '', ''),
(427, 'IMC/035/II/24', '0000-00-00', 'IMC', 'Mohon di lakukan pekerjaan : Pengorderan dan pemasangan center lamp sebanyak 1 unit untuk support pemasangan barcode luar ( Double Barcode ) pada mesin BTU 10.07 Departement Building Tire Plant-I.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'M.MUSHLIH F.', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7328', 'SPC', 'B', '-', '', ''),
(428, 'IBC/047/II/24', '0000-00-00', 'IBC', 'Mohon di lakukan pekerjaan : Di order dan di pasangkan lampu penerangan sebanyak 2 pcs untuk wind up IBC 06.01 Plant-I. M & r.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'ERIKA SP.', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7369', 'QN', 'A', '-', '', ''),
(429, 'BTD/029/ID/II/24', '0000-00-00', 'BTD', 'Mohon untuk di pasangkan mesin chiller beserta part-part supportnya di area cooling conveyor mesin Tread Extruder ITE 07.01. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'MABRURI', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7370', 'QN', 'B', '-', '', ''),
(430, 'IMC/050/III/24', '0000-00-00', 'IMC', 'Mohon di lakukan pekerjaan pengorderan dan pemasangan center lamp sebanyak 1 unit untuk support pemasangan barcode luar (double barcode) pada mesin BTU 10.08 Departement Building Tire Plant-I.M&R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'M.MUSHLIH F.', 0, 0, 0, 0, 0, '2024-03-12', '5', 'J-7387', 'SP', 'B', '-', '', ''),
(431, '450500/010/II/24', '0000-00-00', 'JRD', 'Perbaikan stop kontak mesin ruang DFT-I dan perbaikan jalur listrik area lab R&D testing. M&R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'ADE M', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7325', 'DLL', 'A', '-', '', ''),
(432, '98800/049/02/24', '0000-00-00', 'DFI', 'Mohon di lakukan penambahan lampu penerangan untuk area FI, DPW 1 relokasi sebanyak 10 set ( mekanik dan elektrik ).', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7326', 'SP', 'A', '-', '', ''),
(433, 'DSC/002/II/24', '0000-00-00', 'DSC', 'Mohon di lakukan perbaikan lagi penambalan Festooner DBB 3,4,5 karena masih ada rembesan air.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'NANANG M.', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7338', 'DLL', 'B', 'Civil Work', '', ''),
(434, '021/JMW/II/24', '0000-00-00', 'JMW', 'Perbaikan katrol bandul yang sudah rusak berkarat lokasi tangki TDAE Plant-D.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'APRIAL', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7348', 'DLL', 'A', '-', '', ''),
(435, '98800/061/02/24', '0000-00-00', 'DRB', 'Mohon bantuannya untuk di lakukan pemasangan Transfering unit (penggantian) 1 set untuk mesin DRB RS 1 (mekanik dan elektrik ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-29', '5', 'J-7356', 'QN', 'B', '-', '', ''),
(436, '98800/066/02/24', '0000-00-00', 'DFI', 'Mohon di lakukan pekerjaan penambahan lampu penerangan sebanyak 17 titik untuk mesin KUF/KDB DPW 1.  CEP  : 14010010424004BA.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7367', 'HSE', 'A', '-', '', ''),
(437, '002/DTL/III/24', '0000-00-00', 'DTL', 'Pemasangan plat dan penggeseran pagar area charger linde -. Ukuran area P: 8m  , L : 7.6 m. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'CHAIRUL S.', 0, 0, 0, 0, 0, '2024-03-12', '5', 'J-7382', 'DLL', 'B', '-', '', ''),
(438, 'DTD-0065-02-24', '0000-00-00', 'DTD', 'Mohon bantuannya untuk penarikan kabel LAN (4) dari source DTE 3 ke workshop technical Die 1. PC CNC GUT (office bawah)  2.CNC ARG 0 (office bawah)  3.PC meeting (office atas)   4.PC monitoring mesin (office bawah).', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'ALFIAN', 0, 0, 0, 0, 0, '2024-03-12', '5', 'J-7385', 'DLL', 'B', '-', '', ''),
(439, '003/DTL/III/24', '0000-00-00', 'DTL', 'Pemasangan instalasi power charger (ganti kabel) area Charger Linde. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'CHAIRUL S.', 0, 0, 0, 0, 0, '2024-03-12', '5', 'J-7386', 'SP', 'A', '-', '', ''),
(440, 'DEP/06/03/24', '0000-00-00', 'DEP', 'Penarikan kabel power 4x70 bekas mesin material Plant-K (KBG-KBF) untuk di gunakan / di tarik kembali untuk panel baru conveyor system DCU-17.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'SUGENG', 0, 0, 0, 0, 0, '2024-03-12', '5', 'J-7389', 'SP', 'B', '-', '', ''),
(441, 'DPW/001/12/23', '0000-00-00', 'DPW', 'Pembuatan dan pemasangan landasan (tanjakan) untuk keluar masuk Forklif di Gudang DPW 2 area pintu belakang.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'A.ERFAN', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7334', 'DLL', 'A', '-', '', ''),
(442, '98800/058/02/24', '0000-00-00', 'KRB', 'Mohon bantuannya untuk di lakukan pemasangan Jointless set di mesin KRB A22 Ex.Hight Hope  ( mekanik dan elektrik ). M & B.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '8', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-29', '5', 'J-7355', 'INM', 'B', '-', '', ''),
(443, '98800/057/02/24', '0000-00-00', 'KRB', 'Mohon bantuannya untuk di lakukan pemasangan Jointless set di mesin KRB A21, Ex. Taihe (mekanik dan elektrik ). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '8', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-29', '5', 'J-7358', 'QN', 'B', '-', '', ''),
(444, '021/MCG/II/24', '0000-00-00', 'MCG', 'Mohon di tambahkan lampu LED untuk area ( Roll Die MCG 12,13,14,15,16 ) beserta penambahan tiang dan lampu di area ( conveyor weighing MCG-3,4,8,10,11,15 )', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7336', 'SP', 'B', '-', '', ''),
(445, '004/MCD/II/24', '0000-00-00', 'MCD', 'Mohon di pasangkan lampu LED di area Roll Die MCD-3.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7345', 'SP', 'A', '-', '', ''),
(446, '012/MCA/II/24', '0000-00-00', 'MCA', 'Mohon di perbaiki lantai bordes MCA 4 atas yang potensi amblas.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DEDI A', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7346', 'HSE', 'A', '-', '', ''),
(447, '022/MCG/II/24', '0000-00-00', 'MCG', 'Mohon di tambahkan lampu LED di area : -. MCG2 samping  -. Antara MCG 1 dan 17.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7373', 'DLL', 'A', '-', '', ''),
(448, '023/MCG/II/24', '0000-00-00', 'MCG', 'Mohon di tambahkan plat untuk storage material pada area raw system 2 MCG.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7377', 'DLL', 'A', '-', '', ''),
(449, '98800/064/02/24', '0000-00-00', 'MCI', 'Mohon di lakukan pekerjaan sbb :  Pembuatan deck jembatan dan modifikasi Elevator 1 MCI.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7381', 'MD', 'C', '-', '', ''),
(450, '007/MCD/III/24', '0000-00-00', 'MCD', 'Mohon di pindahkan dan di buatkan tangga baru di mesin MCD 6 area Cooling Rack.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2024-03-12', '5', 'J-7384', 'SP', 'B', '-', '', ''),
(451, '98800/046/02/24', '0000-00-00', 'DPW', 'Mohon untuk di pasangkan penerangan lampu jalan untuk area Temporary Warehause di belakang  Ex.Softex 2.  CEP : 14010010424001NA.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7333', 'HSE', 'A', '-', '', ''),
(452, 'RFH/002/14/24', '0000-00-00', 'RFH', 'Pemasangan warning lamp 7 titik area Plant TBR.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'RIDWAN A', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7337', 'HSE', 'A', '-', '', ''),
(453, '98800/052/02/24', '0000-00-00', 'RTE', 'Mohon bantuannya untuk pemasangan auto pricking sidewall di mesin Extruder (RTE-EX3 ) bagian conveyor loading wind up sistem pantruck. CEP : 65010011023003NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7340', 'MD', 'A', '-', '', ''),
(454, 'RTB/005/01/24', '0000-00-00', 'RTB', 'Mohon di geserkan let off Body Ply dan Inner Linner mesin RTB B4. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'AGUS S', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7341', 'MD', 'A', '-', '', ''),
(455, '98800/050/02/24', '0000-00-00', 'RTB', 'Mohon bantuannya untuk pemasangan GT unloader di mesin Building ( RTB A2 & RTB A4 ) sebanyak 2 unit.  CEP : 52020111022001NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7343', 'MD', 'A', '-', '', ''),
(456, '98800/051/02/24', '0000-00-00', 'RTB', 'Mohon bantuannya untuk pemasangan Tread Applier Auto Hight & Width di mesin Building (RTB-D1) sebanyak 1 unit. CEP : 52020111021001NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '10', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7344', 'MT', 'A', '-', '', ''),
(457, '12/GHE/II/24', '0000-00-00', 'GHE', 'Pemindahan stop kontak dari tiang kayu ke tembok.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'DIKI', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7351', 'DLL', 'A', '-', '', ''),
(458, '038/JMW/II/24', '0000-00-00', 'JMW', 'Pemasangan lampu Emergency sejumlah 7 titik di Gudang ARM-17.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'NUGI W', 0, 0, 0, 0, 0, '2024-02-29', '5', 'J-7361', 'HSE', 'A', '-', '', ''),
(459, '045/JMW/II/24', '0000-00-00', 'JMW', 'Pembongkaran pipa tidak terpakai di karenakan menghalangi saat proses penyimpanan material, lokasi  gudang ARM-17.', '-', 'Mekanik', '-', '-', '-', '-', '-', '10', 'ARON G', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7376', 'DLL', 'A', '-', '', ''),
(460, '02/Safety-public/III/24', '0000-00-00', 'HSE', 'Mohon di pasangkan instalasi listrik (stop kontak) sebanyak 15 titik di lokasi HSE Ex.Softex.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'TAUFIK A', 0, 0, 0, 0, 0, '2024-03-12', '5', 'J-7388', 'DLL', 'A', '-', '', ''),
(461, 'TTE/001/02/24', '0000-00-00', 'TTE', 'Pembongkaran ruang radial dan MEP ( mekanik, elektrik, piping ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '11', 'FERDY', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7365', 'DLL', 'B', 'Civil Work', '', ''),
(462, '033/JMW/II/24', '0000-00-00', 'JMW', 'Pemasangan lampu TL pada area samping ruang Barcode sejumlah 4 titik lokasi Gudang ARM-1 Pintu 10.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'APRIAL', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7335', 'HSE', 'A', '-', '', ''),
(463, '030/JMW/II/24', '0000-00-00', 'JMW', 'Perapihan kabel di gudang ARM 1 pintu 10.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'APRIAL', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7339', 'DLL', 'A', '-', '', ''),
(464, 'BPW/04/II/24', '0000-00-00', 'BPW', 'Mohon di lakukan pembongkaran tray kabel Ex.mesin Wrapping Gudang Ban APW 3.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'A RASID', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7353', 'DLL', 'A', '-', '', ''),
(465, 'A/APW/2024/02/0007', '0000-00-00', 'APW', 'Mohon di pendahkan kipas angin 3 phase sebanyak 3 titik dan panel stop kontak las 1 titik dari area Maintenance rak ke line A4 APW 2, serta mohon di buatkan dan di pasangkan kipas Exhaust sebanyak  2 titik di line A4 APW 2 ( untuk area maintenance Gudang ', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'FEBRY H.', 0, 0, 0, 0, 0, '2024-02-29', '5', 'J-7360', 'DLL', 'B', '-', '', ''),
(466, '98800/062/02/24', '0000-00-00', 'CBM', 'Mohon di lakukan pekerjaan pembuatan deck untuk cover jalur water return area mesin Mixer CBM Plant-C (total 24 modul) gambar terlampir. Note : Material menggunakan bongkaran Ex.Curing Tire ITC Line 1 dan 2. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '3', 'ENTIS S.', 0, 0, 0, 0, 0, '2024-02-29', '5', 'J-7364', 'SP', 'C', '-', '', ''),
(467, '641100-24/II/003', '0000-00-00', 'HFI', 'Mohon di buatkan tiang untuk kipas angin dan di pindahkan kipas angin di area FI tire Plant-H.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '6', 'M HAMID A', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7330', 'DLL', 'A', '-', '', ''),
(468, '641100-24/II/004', '0000-00-00', 'HFI', 'Mohon di pindahkan meja cek ke sebelah meja repair di area FI tire Plant-H.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '6', 'M.HAMID', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7371', 'MD', 'A', '-', '', ''),
(469, '450400/008/II/24', '0000-00-00', 'JRD', 'Penarikan kabel jaringan untuk Server lokal di area R & D compound Lab Testing. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'D.PUJI L.', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7347', 'DLL', 'A', '-', '', ''),
(470, '98800/059/02/24', '0000-00-00', 'DRB', 'Mohon bantuannya untuk di lakukan pemasangan Transfering unit (penggantian) 1 set untuk mesin DRB PQ 5 (mekanik dan elektrik ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-29', '5', 'J-7357', 'QN', 'B', '-', '', ''),
(471, '98800/060/02/24', '0000-00-00', 'DRB', 'Mohon bantuannya untuk di lakukan pemasangan Transfering unit (penggantian) 1 set untuk mesin DRB PQ 4 (mekanik dan elektrik ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-29', '5', 'J-7359', 'QN', 'B', '-', '', ''),
(472, '98800/067/02/24', '0000-00-00', 'DFI', 'Mohon di lakukan pekerjaan penotokan pipa air dan pemindahan mixer Alicone di area KUF/KDB DPW1. CEP : 14010010424004BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7366', 'DLL', 'A', '-', '', ''),
(473, '019/MCG/II/24', '0000-00-00', 'MCG', 'Mohon di lakukan pengorderan dan pemasangan lampu penerangan LED sebanyak 2 pcs pada area apel MCG.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7352', 'DLL', 'A', '-', '', ''),
(474, '98800/055/02/24', '0000-00-00', 'DTE', 'Mohon di lakukan relokasi timbangan lantai Ex.Open Mill OES ke ARM-3 sebanyak 1 set. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-29', '5', 'J-7362', 'HSE', 'A', '-', '', ''),
(475, '98800/056/02/24', '0000-00-00', 'DTE', 'Mohon di lakukan relokasi seleksi compound Ex.Open Mill OES ke ARM-3 sebanyak 1 set. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-02-29', '5', 'J-7363', 'HSE', 'A', '-', '', ''),
(476, '024/MCG/II/24', '0000-00-00', 'MCG', 'Mohon di perbaiki tutup got ( area belakang elevator 1 bawah )', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-03-07', '5', 'J-7378', 'HSE', 'A', '-', '', ''),
(477, '009/MCD/III/24', '0000-00-00', 'MCD', 'Mohon di lakukan pemasangan, penarikan dan pembuatan jalur kabel jaringan untuk instalasi jaringan di  kantor MCD baru.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2024-03-12', '5', 'J-7383', 'DLL', 'A', '-', '', ''),
(478, 'RFH/01/02/24', '0000-00-00', 'RFH', 'Mohon di tambahkan lampu penerangan di area pertigaan RFI/Plant-E.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'MAMAN S', 0, 0, 0, 0, 0, '2024-02-23', '5', 'J-7342', 'HSE', 'A', '-', '', ''),
(479, '007/JO/GAD/III/24', '0000-00-00', 'GAD', 'Pemasangan lampu High Bay LED 80 W di area Pool Kendaraan sebanyak 10 pcs.  -. Untuk lampu 10 pcs sudah tersedia di pool kendaraan.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ANTON S', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7399', 'DLL', 'A', '-', '', ''),
(480, 'JBW/027/03/24', '0000-00-00', 'JBW', 'Mohon di buatkan stopper/penahan untuk rak plat ABW 1 ( agar plat tidak jatuh/membentur tembok ).', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'CATUR', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7410', 'HSE', 'A', '-', '', ''),
(481, 'ATB/003/III/24', '0000-00-00', 'ATB', 'Pemasangan mesin Extruder Tread winding baru. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'RAYMON', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7412', 'INM', 'B', '-', '', ''),
(482, 'BPW/03/XII/23', '0000-00-00', 'BPW', 'Mohon di tutup lantai Ex. Lift barang 1st floor dan 2nd floor Gudang Ban B BPW 1.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'A.RASID', 0, 0, 0, 0, 0, '2024-03-18', '5', 'J-7390', 'DLL', 'A', '-', '', ''),
(483, 'BPW/02/X/23', '0000-00-00', 'BPW', 'Mohon di lakukan pemindahan dan penambahan balok regel di tiang E48 - E49 area 2nd floor Gudang Ban B BPW 1.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'A.RASID', 0, 0, 0, 0, 0, '2024-03-18', '5', 'J-7391', 'DLL', 'A', '-', '', ''),
(484, 'BPW/01/III/24', '0000-00-00', 'BPW', 'Mohon di orderkan dan di pasangkan sbb :  1.Kipas angin gantung KDK 1 bh di area meja team \'hitung stock 2nd floor Gudang Ban BPW 1   2.Stop kontak 4 lubang 1 bh untuk dispenser dan tempat charger HT  3.Lampu TL 3 bh untuk penerangan ketika rekap hitung s', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'A.RASID', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7393', 'SP', 'B', '-', '', ''),
(485, '03/GSC/III/24', '0000-00-00', 'GSC', 'Perubahan instalasi listrik water top RO Plant-B.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'THOMAS', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7395', 'DLL', 'A', '-', '', ''),
(486, 'BMC/060/III/24', '0000-00-00', 'BMC', 'Mohon di lakukan pekerjaan pemasangan mesin Barcode di BMC line 01 s/d BMC line 05 \'total 44 mesin. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'PANGIRING', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7398', 'SP', 'B', '-', '', ''),
(487, 'BTE/056/III/24', '0000-00-00', 'BTE', 'Mohon di pasangkan : Plate Y-Zer ( area produksi tread Extruding BTE ) sesuai lampiran denah BTE. Qty : ? 62 plate. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'BUDY A.', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7402', 'DLL', 'C', '-', '', ''),
(488, 'BBC/057/III/24', '0000-00-00', 'BBC', 'Mohon di pasangkan :  -. Plate Y-Zer ( area produksi Bias Cutting BBC ) sesuai lampiran denah area BBC. Qty : ? 62 plate. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'BUDY A.', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7403', 'DLL', 'C', '-', '', ''),
(489, 'BPW/03/III/24', '0000-00-00', 'BPW', 'Mohon di orderkan dan di pasangkan sbb :  1.lampu highbay 1 bh di tiang E51 2nd floor BPW1  2. lampu  highbay di area loading dock pintu 1,2,3 sebanyak 14 bh  3. Lampu TL sebanyak 16 bh di area penyimpanan tire OE 1st floor Gudang Ban BPW 1.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'A.RASID', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7419', 'HSE', 'A', '-', '', ''),
(490, 'HBC/055/III/24', '0000-00-00', 'HBC', 'Mohon di pasangkan :  -. Plate Y-Zer ( area produksi Bias Cutting HBC , HSQ, HTE ) sesuai lampiran denah area Div. Material Plant-H. Qty : ? 62 plate. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '6', 'BUDY A.', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7404', 'DLL', 'C', '-', '', ''),
(491, 'HTC/058/III/24', '0000-00-00', 'HTC', 'Mohon di orderkan dan di pasangkan  -.Grounding untuk mesin GOP dan Storage PCP Curing Tire ( HTC ).', '-', 'Elektrik', '-', '-', '-', '-', '-', '6', 'SETYO W.', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7409', 'HSE', 'A', '-', '', ''),
(492, '04/GSC/III/24', '0000-00-00', 'GSC', 'Perubahan instalasi listrik water top RO Plant-I.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'RADIMIN', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7396', 'DLL', 'A', '-', '', ''),
(493, 'ITL/072/III/24', '0000-00-00', 'ITL', 'Mohon di lakukan pekerjaan : Penambahan dan pemasangan kipas angin sebanyak 3 pcs untuk area ITL 02.01 tiang E8 dan tiang E10. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'ERIKA SP.', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7418', 'DLL', 'A', '-', '', ''),
(494, '98800/069/03/24', '0000-00-00', 'IMC', 'Mohon di lakukan pekerjaan pemasangan new Building Round Charge Bacth/sebanyak 8 unit, mekanik, elektrik dan assesories. CEP : 1602011032300NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'SUPRIYADI', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7411', 'INM', 'B', 'Civil Work', '', ''),
(495, 'DPW/002/03/24', '0000-00-00', 'DPW', 'Mohon pengadaan dan pemasangan 7 bh lampu tembak untuk penerangan samping Gudang DPW 1 dampak renovasi Gudang DPW 3.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'A ERFAN', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7394', 'HSE', 'A', '-', '', ''),
(496, '0001/DTL/III/24', '0000-00-00', 'DTL', 'Mohon bantuannya untuk di bongkar panel profilo online dan mesin profilo online DTL 1.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'SUYANTO', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7401', 'DLL', 'A', '-', '', ''),
(497, 'DTC/013/III/24', '0000-00-00', 'DTC', 'Mohon di buatkan palang preeload sebanyak 2 set. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'HERU S', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7413', 'DLL', 'A', '-', '', ''),
(498, 'DTC/015/III/24', '0000-00-00', 'DTC', 'Mohon untuk di tambah lampu LCD di area preeload sebanyak 1 titik. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'HERU S', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7414', 'DLL', 'A', '-', '', ''),
(499, '07/DFI-JO/III/24', '0000-00-00', 'DFI', 'Mohon di buatkan sumber/tarik kabel untuk source mesin scrap di area scrap di samping kantor GS.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'SOPYAN S', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7415', 'DLL', 'A', '-', '', ''),
(500, '06/DFI-JO/III/24', '0000-00-00', 'DFI', 'Mohon di pasangkan Exhaust 4 pcs + cover besi di area Pasta DPW 1.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'SOPYAN S', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7416', 'DLL', 'A', 'Civil Work', '', ''),
(501, 'DFI/001/03/24', '0000-00-00', 'DFI', 'Mohon bantuannya untuk di pasangkan Safety sensor di pintu masuk DUF ( Part sudah ready ). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'RAHMAT', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7417', 'HSE', 'A', '-', '', ''),
(502, 'DTC/012/III/24', '0000-00-00', 'DTC', 'Mohon di buatkan tabung angin area Preeload. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'HERU S', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7420', 'SP', 'A', '-', '', ''),
(503, '001/EFC/III/24', '0000-00-00', 'EFC', 'Mohon di perbaiki kipas di area Plant-E.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '5', 'JOKO S', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7405', 'DLL', 'A', 'Civil Work', '', ''),
(504, '012/MCD/III/24', '0000-00-00', 'MCD', 'Mohon di lakukan pemasangan plat besi area bekas lubang wig wag depan MCD-7 atas.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7407', 'DLL', 'A', '-', '', ''),
(505, '013/MCD/III/24', '0000-00-00', 'MCD', 'Mohon di lakukan pemasangan plat besi selasar lantai bawah MCD 1,2,3,4,5 dan 7.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7408', 'DLL', 'A', 'Civil Work', '', ''),
(506, '016/MCD/III/24', '0000-00-00', 'MCD', 'Mohon di lakukan pemasangan plat besi area conveyor weighing line 1,2,3,4,5,6,7 area MCD.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7425', 'HSE', 'B', 'Civil Work', '', ''),
(507, '010/MCD/III/24', '0000-00-00', 'MCD', 'Mohon di buatkan dudukan akses point sebanyak 3 pcs untuk pemasangan akses point di kantor baru MCD.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2024-04-02', '5', 'J-7426', 'DLL', 'A', '-', '', ''),
(508, '98800/068/02/24', '0000-00-00', 'MCG', 'Mohon di lakukan pekerjaan sbb : Pemasangan Hoist Carbon MCG beserta assesoriesnya sebanyak 3 set. CEP : 12020019023006BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7400', 'INM', 'B', 'Civil Work', '', ''),
(509, 'RFH/003/02/24', '0000-00-00', 'RFH', 'Mohon di perbaiki lampu PJU yang mati di area Plant TBR. No PJU : R21, R13, R1', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'DAMAR S', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7392', 'HSE', 'A', '-', '', ''),
(510, '011/IEM/III/24', '0000-00-00', 'IEM', 'Perbaikan 1 pcs lampu sorot PJU yang mati di kepala burung. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'TAUFIK A', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7423', 'HSE', 'A', '-', '', ''),
(511, '010/IEM/III/24', '0000-00-00', 'IEM', 'Perbaikan 1 pcs lampu sorot yang mati di pos pantau Scurity kepala burung. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '10', 'TAUFIK A', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7424', 'HSE', 'A', '-', '', ''),
(512, '640500-24/III/005', '0000-00-00', 'BFI', 'Mohon di modifikasi pipa pembuangan air water leaky tester di area FI Tube Plant-B.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'WAHYUDIN', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7397', 'MD', 'A', '-', '', ''),
(513, 'ITE/071/III/24', '0000-00-00', 'ITE', 'Mohon di lakukan pekerjaan : Perbaikan kabel-kabel blower dan grounding Ex. Bongkaran tembok di tiang G1,L1 dan E1 Tread Extruder Plant-I. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'RAHMAT', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7422', 'HSE', 'A', '-', '', ''),
(514, '011/MCD/III/24', '0000-00-00', 'MCD', 'Mohon di lakukan pemasangan plat besi area loading atas MCD, tebal plat besi 8mm.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2024-03-20', '5', 'J-7406', 'DLL', 'B', '-', '', ''),
(515, '041/MCG/III/24', '0000-00-00', 'MCG', 'Mohon bantuannya untuk penarikan kabel LAN dari ruang panel MCG 03 ke ruang Ex. Rheometer MCG.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-03-26', '5', 'J-7421', 'DLL', 'A', '-', '', ''),
(516, '005/MCD/III/24', '0000-00-00', 'MCD', 'Mohon di lakukan peninggian posisi cermin di area MCD.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'JOKO S', 0, 0, 0, 0, 0, '2024-04-02', '5', 'J-7427', 'MD', 'A', '-', '', ''),
(517, 'JWS/002/IV/24', '0000-00-00', 'JWS', 'Mohon bantuannya untuk di lakukan pemindahan mesin Punching pada workshop-2 di pindahkan pada area kerja depan workshop ( bekas ex. Trafo Utility ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '1', 'ACH DWI', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7435', 'MD', 'A', '-', '', ''),
(518, '21/GPR/03/25/24', '0000-00-00', 'GPR', 'Penarikan kabel untuk wifi dari panel di depan AII ke mess AIII No.4. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ARIEF S', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7448', 'DLL', 'A', '-', '', ''),
(519, 'JBW/026/03/24', '0000-00-00', 'JBW', 'Mohon di buatkan penutup di rak motor ABW 1, menggunakan seng. Uk. L : 800cm, T : 350 cm.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'CATUR', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7486', 'DLL', 'A', 'Civil Work', '', ''),
(520, 'AFI/24/III/003', '0000-00-00', 'AFI', 'Rekondisi panel conveyor modular line A,B,C,D Qty : 1 set. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'AGIL', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7488', 'MD', 'B', '-', '', ''),
(521, 'A/APW/2024/03/0013', '0000-00-00', 'APW', 'Mohon di perbaiki/di ganti pintu 1 (rusak) di APW 2 (sulit di buka dan tidak bisa tertutup rapat). M&R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '1', 'FEBRY H.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7489', 'HSE', 'B', '-', '', ''),
(522, '640500-24/III/005', '0000-00-00', 'BFX', 'Modifikasi meja inspeksi menjadi meja vakum tube replacement beserta instalasinya.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'WAHYUDIN', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7445', 'MD', 'A', '-', '', ''),
(523, '640500-24/IV/007', '0000-00-00', 'BFX', 'Mohon di modifikasi pipa pipa mesin vakum OE mesin vakuum No. 4,5 dan 6.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'WAHYUDIN', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7449', 'MD', 'B', '-', '', ''),
(524, 'BTC/084/III/24', '0000-00-00', 'BTC', 'Mohon di order dan di pasangkan : stop kontak untuk charger PDT di area curing tire B ( keperluan \'barcode system curing tire BTC ) sebanyak 23 titik. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '2', 'SETYO W.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7455', 'SP', 'A', '-', '', ''),
(525, 'BTE/087/IV/24', '0000-00-00', 'BTE', 'Mohon di pasangkan : Plat Y-zer untuk lantai area Tread Extruding ( BTE ) area Booking BTE 04 & \'area Storage Tread. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'BUDY A.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7461', 'DLL', 'B', '-', '', ''),
(526, 'BBC/088/IV/24', '0000-00-00', 'BBC', 'Mohon di pasangkan : Plat Y-Zer untuk lantai area Bias Cutting (BBC), area wind up mesin BBC 02,03,  \'04 dan Storage TUC. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'BUDY A.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7463', 'HSE', 'B', '-', '', ''),
(527, 'BXC/001/IV/24', '0000-00-00', 'BXC', 'Mohon di pasangkan : Plat Y-Zer (area produksi curing tube) sesuai denah area curing tube. Qty: ? 150 pcs.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'KURDI', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7466', 'DLL', 'C', '-', '', ''),
(528, 'BFS/09/IV/24', '0000-00-00', 'BFS', 'Mohon di buatkan tangga untuk akses keluar pintu darurat kantor atas Plant-B.', '-', 'Mekanik', '-', '-', '-', '-', '-', '2', 'EKO BS', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7473', 'HSE', 'B', 'Workshop', '', ''),
(529, 'BPW/01/IV/24', '0000-00-00', 'BPW', 'Mohon di modifikasi mesin Strapping sebanyak 10 unit di Gudang Ban B. Note : Mohon agar di buatkan  \'sample 1 unit telebih dahulu, jika sample sudah OK mohon di buatkan sesuai Qty mesin Strapping.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '2', 'A.RASID', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7495', 'MD', 'B', '-', '', ''),
(530, 'HTC/083/III/24', '0000-00-00', 'HTC', 'Mmohon di order dan di pasangkan : stop kontak untuk charger PDT di area curing tire H ( keperluan barcode system curing tire HTC ) sebanyak 12 titik. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '6', 'SETYO W.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7456', 'SP', 'B', '-', '', ''),
(531, 'HBC/090/IV/24', '0000-00-00', 'HBC', 'Mohon di pasangkan :  -. Plate Y-Zer untuk lantai area Bias Cutting ( HBC ) & ( HSQ ) lantai area  Storage Compound, Storage TUC, Storage Tread, Slitter Compound. M & R.', '-', 'Mekanik', '-', '-', '-', '-', '-', '6', 'BUDY A.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7462', 'DLL', 'B', '-', '', ''),
(532, 'HBC/089/IV/24', '0000-00-00', 'HBC', 'Mohon di pasangkan : Modifikasi Wind Up ( penambahan Accumulator dan Transweel ) mesin HBC 01 Qty : 1 mesin. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '6', 'BUDY A.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7471', 'MD', 'B', '-', '', ''),
(533, 'ITE/096/IV/24', '0000-00-00', 'ITE', 'Mohon di lakukan pekerjaan : Pemasangan auto bank compound pada roll calender TUC online  sebanyak 2 unit untuk ITE 03.01 dan 05.01 Plant-I. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'RAHMAT', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7439', 'SP', 'B', '-', '', ''),
(534, 'BTD/043/IV/ID/24', '0000-00-00', 'BTD', 'Mohon untuk di pasangkan servicer catridge type pada servicer mesin Building Ex. Jiang Yie  ( IMC 12.09 ). M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'MABRURI', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7440', 'SP', 'B', '-', '', ''),
(535, '641100-24/IV/002', '0000-00-00', 'IFI', 'Mohon di orderkan dan di pasangkan kipas angin skoda untuk area wobbling 12 Plant-I sebanyak 1 set', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'M.HAMID', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7442', 'DLL', 'A', '-', '', ''),
(536, '641100-24/IV/003', '0000-00-00', 'IFI', 'Mohon di orderkan dan di pasangkan kipas angin skoda untuk area check 1 Plant-I sebanyak 1 set', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'M.HAMID', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7443', 'DLL', 'A', '-', '', ''),
(537, '640000-24/III/002', '0000-00-00', 'IFI', 'Mohon di buatkan dan di pasangkan grounding exol, berikut panel nya di area Repair Tire Plant-I.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'SANDOYO', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7459', 'HSE', 'B', '-', '', ''),
(538, 'ITE/097/IV/24', '0000-00-00', 'ITE', 'Mohon di lakukan pekerjaam : Di orderkan dan di pasangkan lampu penerangan serta dudukannya sebanyak 2 pcs di area cuci tangan Plant-I.  M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '7', 'ERIKA SP.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7478', 'HSE', 'A', '-', '', ''),
(539, 'ITE/082/III/24', '0000-00-00', 'ITE', 'Mohon di lakukan pekerjaan : Modifikasi 3 unit Compound Feeding conveyor ( Re-Position ) untuk  mesin ITE 03.01, 05.01 dan 06.01 Tread Extruder Plant-I. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'RAHMAT', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7499', 'MD', 'C', 'Workshop', '', ''),
(540, '98800/079/03/24', '0000-00-00', 'ITL', 'Mohon bantuannya untuk di lakukan pembongkaran dan pemasangan kembali mesin Squeeqe ITL SQ 02 dan 90-Extruder Ex. ITL 03. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '7', 'SUPRIYADI', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7496', 'MD', 'B', '-', '', ''),
(541, '450400/019/III/24', '0000-00-00', 'JRD', 'Mapping stabilizer di R&D compound testing (Plant-D) serta relokasi stop kontak.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'EVAN', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7446', 'DLL', 'A', '-', '', ''),
(542, 'DFS/01/03/24', '0000-00-00', 'DFS', 'Mohon di pasangkan paging system tahap 2 ( area DRB, KRB, DTC, KTC, Checking D, Checking K )', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'M.REZA', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7447', 'SPC', 'B', '-', '', '');
INSERT INTO `pengajuan_job_order` (`id`, `no_jo`, `tgl_jo`, `cc_no`, `pekerjaan`, `tujuan`, `pelaksana`, `rencana`, `cep_no`, `lampiran`, `dwg_no`, `mesin_no`, `id_plant`, `id_pemesan`, `id_depthead`, `id_planthead`, `id_factoryhead`, `id_eng_depthead`, `id_penerima`, `tgl_terima`, `status`, `no_file`, `klasifikasi`, `golongan`, `departemen_lain`, `saran_dept`, `saran_plant`) VALUES
(543, '076/JMW/IV/24', '0000-00-00', 'JMW', 'Perbaikan plat penutup drainase di depan Gudang ARM 3.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'APRIAL', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J=7472', 'HSE', 'A', '-', '', ''),
(544, '450500/016/III/24', '0000-00-00', 'JRD', 'Pemasangan saklar dan stop kontak baru pada ruang mesin dan ruang kerja Lab R & D Testing.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'LUTFI A', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7483', 'DLL', 'A', '-', '', ''),
(545, '450500/017/III/24', '0000-00-00', 'JRD', 'Pemasangan, pembuatan jalur daya listrik dan penarikan kabel LAN untuk CCTV di Lab R&D Testing.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'DWI', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7485', 'DLL', 'A', '-', '', ''),
(546, '0001/DTE/IV/24', '0000-00-00', 'DTE', 'Mohon bantuannya untuk di pindahkan mesin Slitting yang berada di area Open Mill MCD ke area DFI.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'AGUS S', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7490', 'MD', 'A', '-', '', ''),
(547, 'DPW/001/04/24', '0000-00-00', 'DPW', 'Mohon pembuatan Charging Station Forklif Elektrik di Gudang Ban D. Note : Panel Charging Station terpisah dari panel induk.', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'A.ERFAN', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7492', 'SP', 'B', '-', '', ''),
(548, '98800/083/04/24', '0000-00-00', 'DRB', 'Mohon bantuannya untuk di lakukan pemindahan 1 unit Tread Applier ( Taihe ) dari mesin DRB E3 ke mesin DRB PQ3 (bongkar existing) ( elektrik, mekanik dan civil ) M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7460', 'SPC', 'B', '-', '', ''),
(549, '98800/075/03/24', '0000-00-00', 'DTL', 'Mohon bantuannya untuk di lakukan pemasangan Rejector Auto Hole Detection di mesin DTL 2, elektrik dan mekanik. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7469', 'MD', 'A', '-', '', ''),
(550, '98800/073/03/24', '0000-00-00', 'DRB', 'Mohon bantuannya untuk di lakukan modifikasi jalur Hanging conveyor DRB E-F untuk Project Saferun SF 3-4, elektrik dan mekanik. CEP : 12020019022012NA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7470', 'MD', 'C', '-', '', ''),
(551, '98800/086/04/24', '0000-00-00', 'DTL', 'Mohon bantuannya untuk di lakukan modifikasi kaki metal Detector In put Compound DBEC.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7498', 'MD', 'B', '-', '', ''),
(552, 'DSC/003/IV/24', '0000-00-00', 'DSC', 'Mohon di lakukan pembuatan cover stainless steel lubang festooner DBB1 karena masih ada rembesan air dan pemasangan cover stainless', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'NANANG M.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7428', 'MD', 'A', 'Civil Work', '', ''),
(553, 'DSC/004/IV/24', '0000-00-00', 'DSC', 'Mohon di lakukan pembuatan cover stainless steel lubang festooner DBB2 karena masih ada rembesan air dan pemasangan cover stainless', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'NANANG M.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7429', 'MD', 'A', 'Civil Work', '', ''),
(554, 'DSC/005/IV/24', '0000-00-00', 'DSC', 'Mohon di lakukan pembuatan cover stainless steel lubang festooner DBB4 karena masih ada rembesan air dan pemasangan cover stainless', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'NANANG M.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7430', 'MD', 'A', 'Civil Work', '', ''),
(555, 'DTC/022/IV/24', '0000-00-00', 'DTC', 'Mohon untuk di tambah lampu LED di area KMC sebanyak 5 titik. M & R.', '-', 'Elektrik', '-', '-', '-', '-', '-', '8', 'HERU S', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7453', 'HSE', 'A', '-', '', ''),
(556, 'DTC/023/IV/24', '0000-00-00', 'DTC', 'Mohon untuk di pasang exhaust di area cleaning mold KMC sebanyak 2 pcs. M & R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '8', 'HERU S', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7454', 'DLL', 'A', 'Civil Work', '', ''),
(557, '11/DFI-JO/III/24', '0000-00-00', 'DFI', 'Mohon di tambahkan conveyor modular di area Booking KUF.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '8', 'SOPYAN S', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7457', 'MD', 'B', '-', '', ''),
(558, '09/DFI-JO/III/24', '0000-00-00', 'DFI', 'Mohon di pasangkan dan penambahan lampu penerangan di area Booking Ex. Parkir KUF.', '-', 'Elektrik', '-', '-', '-', '-', '-', '8', 'SOPYAN S', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7458', 'SP', 'A', '-', '', ''),
(559, '022/MCD/IV/24', '0000-00-00', 'MCD', 'Mohon di lakukan penarikan kabel power untuk stop kontak power switch CCTV area MCD-7 bawah tiang R-2 bawah', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'NIZFAN', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7436', 'DLL', 'A', '-', '', ''),
(560, '052/MCG/IV/24', '0000-00-00', 'MCG', 'Mohon di lakukan penggantian, pemasangan dan settingan safety brake elevator barang di area MCG sebanyak 2 set.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7450', 'HSE', 'B', '-', '', ''),
(561, '004/MCI/IV/24', '0000-00-00', 'MCD', 'Mohon di lakukan penggantian, pemasangan dan setting safety brake elevator barang di area MCI sebanyak 1 set.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'SUPRIYANTO', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7451', 'MD', 'A', '-', '', ''),
(562, '021/MCA/IV/24', '0000-00-00', 'MCA', 'Mohon di lakukan penggantian, pemasangan dan setting safety brake elevator barang di area MCA sebanyak 3 set.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'SUPRIYANTO', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7452', 'MD', 'A', '-', '', ''),
(563, '019/MCA/III/24', '0000-00-00', 'MCA', 'Mohon di pasang lampu penerangan dan kipas di area mesin metal detector MCA (dekat tiang A2).', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'DEDI A', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7464', 'SP', 'A', '-', '', ''),
(564, '066/JMW/III/24', '0000-00-00', 'JMW', 'Pembuatan pijakan kaki untuk di area tangki oli GK.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ARON G', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7465', 'SP', 'B', '-', '', ''),
(565, '053/MCG/IV/24', '0000-00-00', 'MCG', 'Mohon di orderkan dan di pasangkan besi untuk lantai ruang Automatic Chemical Weighing System &#40;ACWS&#41; MCG', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7474', 'DLL', 'B', '-', '', ''),
(566, '018/MCA/IV/24', '0000-00-00', 'MCA', 'Mohon di perbaiki plat lantai di bawah area office baru MCD.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'WIFA A', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7475', 'HSE', 'A', '-', '', ''),
(567, '023/MCA/IV/24', '0000-00-00', 'MCA', 'Mohon untuk di buatkan pagar pengaman di talang pembuangan air huyjan pada tiang C14.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DEDI A', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7477', 'HSE', 'A', '-', '', ''),
(568, '058/MCG/IV/24', '0000-00-00', 'MCG', 'Mohon di perbaiki plat lantai lepas las lasannya area MCG 6 atas.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ADE M', 0, 0, 0, 0, 0, '2024-07-05', '5', 'J-7479', 'HSE', 'A', '-', '', ''),
(569, '005/MCI/IV/24', '0000-00-00', 'MCI', 'Mohon untuk di pasang plat pada lantai atas MCI 2 dan MCI 3 (menggunakan plat besi tebal 5mm).', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DIDI', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7481', 'HSE', 'B', '-', '', ''),
(570, '020/MCA/III/24', '0000-00-00', 'MCA', 'Mohon untuk di pasang plat pada lantai roll die MCA 5 (menggunakan plat bekas)', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DEDI A', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7493', 'HSE', 'A', '-', '', ''),
(571, '019/MCA/III/24', '0000-00-00', 'MCA', 'Mohon untuk di pasang plat pada lantai open mill MCA 4 (menggunakan plat bekas)', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'DEDI A', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7494', 'HSE', 'A', '-', '', ''),
(572, '98800/074/03/24', '0000-00-00', 'MCA', 'Mohon di lakukan pekerjaan sbb : Upgrade carbon feeding MCA dan Upstream MCA 8. CEP : 1202001902400BA.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7484', 'MD', 'C', '-', '', ''),
(573, '380100/255/IV/24', '0000-00-00', 'GSR', 'Perbaikan lampu penerangan di area jalan dari pos GI 1 menuju pos GI 2 di karenakan padam.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'EKAN J', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7438', 'HSE', 'A', '-', '', ''),
(574, '01/GTL/IV/24', '0000-00-00', 'GTL', 'Instalasi panel listrik beserta rangkaiannya untuk AC sejumlah 8 unit. Lokasi : Ruang training center  ( safety dojo lt 2 ) AC ukuran 2 PK.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'ABINAWA', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7444', 'DLL', 'B', '-', '', ''),
(575, '067/JMW/IV/24', '0000-00-00', 'JMW', 'Mohon di buatkan pengaman (cover) di panel SDB ARM 17 panel PP dan perapihan kabel di area Loading material ( pindah jalur ) untuk persiapan audit Walmart.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'ARON G', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7467', 'HSE', 'A', '-', '', ''),
(576, '072/JMW/IV/24', '0000-00-00', 'JMW', 'Mohon untuk di perbaiki besi loading deck yang patah lokasi Gudang Bahan ARM 17.', '-', 'Mekanik', '-', '-', '-', '-', '-', '9', 'ARON G', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7476', 'HSE', 'A', '-', '', ''),
(577, 'JBW/041/04/24', '0000-00-00', 'JBW', 'Pemasangan Hoist 3 Ton di central storage Ex. Softex.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'ALI P', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7480', 'SP', 'C', '-', '', ''),
(578, '11/GSC/24/IV/24', '0000-00-00', 'GSC', 'Mohon bantuannya penggantian kabel listrik area kerja team di kandang sapi Gardu Induk.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'MARJUKI', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7482', 'HSE', 'A', '-', '', ''),
(579, 'R/RPW/09/04/24', '0000-00-00', 'RPW', 'Perbaikan fire alarm yang rusak (rotary lamp dan sirine tidak menyala) di tiang C-07 No.8 area Loading Gedung Ban R 01, jumlah 1 titik.', '-', 'Elektrik', '-', '-', '-', '-', '-', '9', 'DANANG', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7491', 'HSE', 'A', '-', '', ''),
(580, '98800/077/03/24', '0000-00-00', 'RTB', 'Mohon bantuannya untuk modifikasi Stand Let Off Belt di mesin Building RTB-A1 sebanyak 8 pcs. M&R.', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7487', 'MD', 'A', '-', '', ''),
(581, '98800/078/03/24', '0000-00-00', 'RTB', 'Mohon bantuannya untuk pemasangan mesin BEC Big Roll System di mesin Extruder RTE-Ex1. CEP :', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '9', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7497', 'INM', 'B', '-', '', ''),
(582, 'JWS/001/IV/24', '0000-00-00', 'JWS', 'Mohon bantuannya untuk di lakukan pemindahan jalur kabel pada workshop-2 ( karena pada saat service libur mesin mati tidak ada aliran listrik ).', '-', 'Elektrik', '-', '-', '-', '-', '-', '1', 'ACH DWI', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7433', 'MD', 'A', '-', '', ''),
(583, 'JWS/001/V/24', '0000-00-00', 'JWS', 'Mohon bantuannya untuk di lakukan : Pemasangan exhaust sebanyak 2 unit pada area kerja repair container Plant-K. ( pengadaan dan pemasangan ).', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'ACH DWI', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7434', 'DLL', 'A', 'Civil Work', '', ''),
(584, '450400/026/IV/24', '0000-00-00', 'JRD', 'Penarikan kabel LAN/Jaringan untuk PC mesin Chemical lantai 1 antara lain : N2SA, PGC & ICP-OES', '-', 'Elektrik', '-', '-', '-', '-', '-', '4', 'PUJI LESTARI', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7437', 'SP', 'A', '-', '', ''),
(585, 'DTD-0120-0324', '0000-00-00', 'DTD', 'Mohon bantuan transportasi untuk scrap tooling extruder ( Dies dan performer ) Total Die Inactive 750 preformer Habis pakai 5.', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'ALFIAN', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7441', 'DLL', 'B', '-', '', ''),
(586, '98800/076/03/24', '0000-00-00', 'DRB', 'Mohon bantuannya u/ di lakukan pemasangan modifikasi weighing mesin, mesin DTB TU 1 (LTR Menac)', '-', 'Elektrik dan Mekanik', '-', '-', '-', '-', '-', '4', 'YUHARKAT', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7468', 'MD', 'B', '-', '', ''),
(587, 'DSC/006/IV/24', '0000-00-00', 'DSC', 'Mohon di lakukan pembuatan cover stainless steel lubang festooner DBB3 karena masih ada rembesan air dan pemasangan cover stainless', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'NANANG M.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7431', 'MD', 'A', 'Civil Work', '', ''),
(588, 'DSC/007/IV/24', '0000-00-00', 'DSC', 'Mohon di lakukan pembuatan cover stainless steel lubang festooner DBB5 karena masih ada rembesan air dan pemasangan cover stainless', '-', 'Mekanik', '-', '-', '-', '-', '-', '4', 'NANANG M.', 0, 0, 0, 0, 0, '2024-05-07', '5', 'J-7432', 'MD', 'A', 'Workshop', '', ''),
(590, 'no_jo', '0000-00-00', 'cc_no', 'pekerjaan', 'tujuan', 'pelaksana', 'rencana', 'cep_no', 'lampir', 'dwg_no', 'mesin_no', 'id_plant', 'id_pemesan', 0, 0, 0, 0, 0, '0000-00-00', 'status', 'no_file', 'klasifik', 'golongan', 'departemen_lain', 'saran_dept', 'saran_plant');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_info` varchar(16) NOT NULL,
  `pekerjaan` varchar(256) NOT NULL,
  `id_plant` int(11) NOT NULL,
  `pelaksana` varchar(32) NOT NULL,
  `tgl_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_informasi`
--

INSERT INTO `tb_informasi` (`id`, `id_user`, `no_info`, `pekerjaan`, `id_plant`, `pelaksana`, `tgl_create`) VALUES
(2, 5, 'INS/07/24/001', 'Masak', 9, 'Elektrik', '2024-07-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_plant`
--

CREATE TABLE `tb_plant` (
  `id_plant` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_plant`
--

INSERT INTO `tb_plant` (`id_plant`, `nama`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'H'),
(7, 'I'),
(8, 'K'),
(9, 'M'),
(10, 'R'),
(11, 'T'),
(24, 'Support');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_report`
--

CREATE TABLE `tb_report` (
  `id` int(11) NOT NULL,
  `id_jo` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl_pengerjaan` date NOT NULL,
  `progres` varchar(16) NOT NULL,
  `tim_pekerja` varchar(128) NOT NULL,
  `item_pekerjaan` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `tim_absen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_report`
--

INSERT INTO `tb_report` (`id`, `id_jo`, `id_member`, `tgl_pengerjaan`, `progres`, `tim_pekerja`, `item_pekerjaan`, `keterangan`, `tim_absen`) VALUES
(3, 199, 4, '2024-05-24', '20', '2', 'Persiapan Material', '-', ''),
(4, 202, 2, '2024-05-24', '1', '1,3', 'Persiapan', '-', ''),
(5, 204, 2, '2024-05-24', '12', '1,3', 'Persiapan', '-', ''),
(6, 204, 4, '2024-05-24', '20', '2', 'Persiapan', '-', ''),
(7, 204, 2, '2024-05-24', '24', '1', 'Pasang Tray', '-', ''),
(8, 204, 2, '2024-05-25', '28', '1', 'Tarik Kabel', '-', ''),
(9, 204, 2, '2024-05-26', '30', '1', 'Kabel Kontrol', '-', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_report_informasi`
--

CREATE TABLE `tb_report_informasi` (
  `id` int(11) NOT NULL,
  `id_info` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl_pengerjaan` date NOT NULL,
  `progres` varchar(16) NOT NULL,
  `tim_pekerja` varchar(128) NOT NULL,
  `item_pekerjaan` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `tim_absen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_report_informasi`
--

INSERT INTO `tb_report_informasi` (`id`, `id_info`, `id_member`, `tgl_pengerjaan`, `progres`, `tim_pekerja`, `item_pekerjaan`, `keterangan`, `tim_absen`) VALUES
(1, 2, 2, '2024-07-18', '20', '1', 'Masak', '-', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `whatsapp` varchar(16) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `nim` varchar(16) NOT NULL,
  `id_plant` varchar(8) NOT NULL,
  `departemen` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `whatsapp`, `image`, `password`, `role_id`, `is_active`, `date_created`, `nim`, `id_plant`, `departemen`) VALUES
(6, 'Doddy Ferdiansyah', 'doddy@gmail.com', '', 'profile.jpg', '$2y$10$FhGzXwwTWLN/yonJpDLR0.nKoeWlKWBoRG9bsk0jOAgbJ007XzeFO', 4, 1, 1552285263, '', '1', ''),
(11, 'Sandhika Galih Dept Head', 'sandhikagalih@gmail.com', '', 'default.jpg', '$2y$10$0QYEK1pB2L.Rdo.ZQsJO5eeTSpdzT7PvHaEwsuEyGSs0J1Qf5BoSq', 3, 1, 1553151354, '', '1', ''),
(12, 'Oki', 'sardiko20@gmail.com', '', 'default.jpg', '$2y$10$LsOv3RO2oYSPy5VEQbU3AepMulZIPA/5EB3u5V0fXbObaP8xzjdQW', 1, 1, 1710380617, '17-0735', '', ''),
(14, 'Diko', 'diko@gmail.com', '', 'default.jpg', '$2y$10$EDEAQX2/he5oqoZwpLA0BurzrryXLyTeA0XBF6/EnJj1BBUi3O/Fq$2y$10$LsOv3RO2oYSPy5VEQbU3AepMulZIPA/5EB3u5V0fXbObaP8xzjdQW', 2, 1, 1711595185, '12345', '1', 'JEI'),
(15, 'icha', 'icha@gmail.com', '', 'default.jpg', '$2y$10$oWBtRno09wmS7h2ImYzKXOn0yI0K5x8r.vYiHeKEYQX09M1BW20bG', 2, 1, 1714028460, '190735', '8', 'KRB'),
(16, 'Tiffany', 'tiffa@gmail.com', '', 'default.jpg', '$2y$10$LZcMIaxCj8/Z48qXflM4guYT6ajJ2rYPN8bbLIcVhuGhRPf7fEso.', 4, 1, 1714032525, '121212', '2', 'DRB'),
(17, 'Andreas Santosa', 'andreas@gt-tires.com', '6289663456037', 'default.jpg', '$2y$10$RhtelfplzoMn5Z89erEU8.hLL0TB4VhaacEQCNolwOrh49CDoUfL.', 2, 1, 1726887235, '17-0001', '1', 'JEM'),
(19, 'Andy', 'andi@gt-tires.com', '628918209182', 'default.jpg', '$2y$10$RhtelfplzoMn5Z89erEU8.hLL0TB4VhaacEQCNolwOrh49CDoUfL.', 3, 1, 1727925174, '17-0002', '1', 'ARB'),
(20, 'Santi hakim', 'santi@gt-tires.com', '6289281728198829', 'default.jpg', '$2y$10$RhtelfplzoMn5Z89erEU8.hLL0TB4VhaacEQCNolwOrh49CDoUfL.', 3, 1, 1727925362, '17-0003', '1', 'ATE'),
(21, 'Arief', 'arief@gt-tires.com', '628989829889289', 'default.jpg', '$2y$10$RhtelfplzoMn5Z89erEU8.hLL0TB4VhaacEQCNolwOrh49CDoUfL.', 4, 1, 1727927425, '17-0004', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(10, 1, 5),
(12, 2, 6),
(14, 1, 7),
(23, 3, 2),
(24, 3, 8),
(25, 4, 2),
(26, 4, 9),
(27, 8, 16),
(28, 8, 17),
(29, 10, 20),
(30, 8, 22),
(31, 2, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Master'),
(6, 'Data Job Order'),
(7, 'Master Job Order'),
(8, 'Job Order DH'),
(9, 'Job Order PH'),
(10, 'User DH'),
(11, 'User PH'),
(14, 'User FH'),
(15, 'Job Order FH'),
(16, 'Leader'),
(17, 'Laporan Job Order'),
(18, 'User EDH'),
(19, 'Job Order EDH'),
(20, 'Assistant'),
(21, 'Section'),
(22, 'Pekerjaan Informasi'),
(23, 'Daftar Pimpinan GT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'User'),
(3, 'Dept Head'),
(4, 'Plant Head'),
(5, 'Factory Head'),
(6, 'Engineering Dept. Head'),
(7, 'Admin Instalasi'),
(8, 'Leader Instalasi'),
(9, 'Section Head Instalasi'),
(10, 'ADH Instalasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 5, 'Data Plant', 'master/plant', 'fas fa-fw fa-users', 1),
(10, 5, 'Data User', 'master/user', 'fas fa-fw fa-users', 1),
(11, 5, 'Data Member', 'master/member', 'fas fa-fw fa-users', 1),
(12, 6, 'Request Job Order', 'user/request', 'fas fa-fw fa-users', 1),
(13, 6, 'App Dept. Head', 'user/adepthead', 'fas fa-fw fa-users', 1),
(14, 6, 'App Plant Head', 'user/aplanthead', 'fas fa-fw fa-users', 1),
(15, 6, 'Reject Job Order', 'user/reject', 'fas fa-fw fa-users', 1),
(16, 8, 'Request Job Order', 'depthead/request', 'fas fa-fw fa-users', 1),
(17, 9, 'Request Job Order', 'planthead/request', 'fas fa-fw fa-users', 1),
(18, 10, 'My Profile', 'depthead', 'fas fa-fw fa-users', 1),
(19, 11, 'My Profile', 'planthead', 'fas fa-fw fa-users', 1),
(20, 8, 'Reject Job Order', 'depthead/reject', 'fas fa-fw fa-user', 1),
(21, 9, 'Reject Job Order', 'planthead/reject', 'fas fa-fw fa-user', 1),
(22, 7, 'Job Order', 'joborder', 'fas fa-fw fa-user', 1),
(33, 15, 'Request Job Order', 'factoryhead/request', 'fas fa-fw fa-users', 1),
(34, 15, 'Reject Job Order', 'factoryhead/reject', 'fas fa-fw fa-users', 1),
(35, 6, 'App Factory Head', 'user/factoryhead', 'fas fa-fw fa-users', 1),
(36, 16, 'Dashboard', 'leader', 'fas fa-fw fa-users', 1),
(37, 17, 'Master Job Order', 'leader/joborder', 'fas fa-fw fa-users', 1),
(38, 17, 'Laporan Harian', 'leader/report', 'fas fa-fw fa-users', 1),
(39, 19, 'Request Job Order', 'engdepthead/request', 'fas fa-fw fa-users', 1),
(40, 19, 'Reject Job Order', 'engdepthead/reject', 'fas fa-fw fa-users', 1),
(41, 5, 'Data Admin', 'master/admin', 'fas fa-fw fa-users', 1),
(42, 20, 'Dashboard', 'assistant', 'fas fa-fw fa-users', 1),
(43, 20, 'Master Job Order', 'assistant/joborder', 'fas fa-fw fa-users', 1),
(44, 20, 'Informasi Job Order', 'assistant/informasi', 'fas fa-fw fa-users', 1),
(45, 22, 'Pekerjaan Informasi', 'leader/informasi', 'fas fa-fw fa-users', 1),
(46, 22, 'Laporan Informasi', 'leader/reportinformasi', 'fas fa-fw fa-users', 1),
(47, 7, 'Laporan Harian', 'joborder/laporan', 'fas fa-fw fa-users', 1),
(48, 5, 'Data Tim Pelaksana', 'master/tim', 'fas fa-fw fa-users', 1),
(49, 23, 'Data Dept. Head', 'user/depthead', 'fas fa-address-card', 1),
(50, 23, 'Data Plant Head', 'user/planthead', 'far fa-address-card', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `whatsapp` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `whatsapp`, `token`, `date_created`) VALUES
(9, 'oki@gmail.com', '67CmpTMLWGfeQn8OszOi2Hg5JXX48hIznAwdW8Yea1k=', 1710380617),
(10, 'sardiko@gmail.com', 'VIAhwZoEHBECgoq4JQ8fuBskm2WAeMPZNm8ylEZxBYA=', 1710400509),
(11, 'diko@gmail.com', 'tYMhDUWFs4jW+7TdwKX3jwtoXVlSaKCdD3IlLZhWG+g=', 1711595185),
(12, 'icha@gmail.com', 'HBUUPqdZgP+f+ESPlXy11IZBNQbNTKa6HXPjLma0R+I=', 1714028460),
(13, 'tiffa@gmail.com', 'lEkirZcQp9OKFPWxmdJ4EkMt7maPnEOBhOqmDIoHu0A=', 1714032525),
(14, 'sardiko20@gmail.com', 'TNhV/09/cy3watZDF5XlhbKN+CpsqWHxT3HafRA8V58=', 1718848291),
(15, 'sardiko20@gmail.com', 'wrdzNFDIfGk8kLBWLy6xpc0f3a7bXkG9TdgfJDZbq1c=', 1718849381),
(16, '6289663456037', '8R8mU9HQo5hCGV5QzkoY6dhKTcgullKozfqAdo5qWIM=', 1726887235);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member_plant`
--
ALTER TABLE `member_plant`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_job_order`
--
ALTER TABLE `pengajuan_job_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_plant`
--
ALTER TABLE `tb_plant`
  ADD PRIMARY KEY (`id_plant`);

--
-- Indeks untuk tabel `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_report_informasi`
--
ALTER TABLE `tb_report_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `member_plant`
--
ALTER TABLE `member_plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_job_order`
--
ALTER TABLE `pengajuan_job_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=591;

--
-- AUTO_INCREMENT untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_plant`
--
ALTER TABLE `tb_plant`
  MODIFY `id_plant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_report_informasi`
--
ALTER TABLE `tb_report_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
