/*
 Navicat Premium Data Transfer

 Source Server         : cms_kasda
 Source Server Type    : SQL Server
 Source Server Version : 10504000
 Source Host           : 199.97.20.9:1433
 Source Catalog        : cms_kasda
 Source Schema         : dbo

 Target Server Type    : SQL Server
 Target Server Version : 10504000
 File Encoding         : 65001

 Date: 04/05/2020 10:36:51
*/


-- ----------------------------
-- Table structure for config_api
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[config_api]') AND type IN ('U'))
	DROP TABLE [dbo].[config_api]
GO

CREATE TABLE [dbo].[config_api] (
  [id] int  NOT NULL,
  [name_api] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [api_url] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[config_api] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of config_api
-- ----------------------------
INSERT INTO [dbo].[config_api] VALUES (N'1', N'rekening_koran', N'http://10.2.2.3:85/')
GO

INSERT INTO [dbo].[config_api] VALUES (N'2', N'cek_saldo', N'http://10.2.2.2:22280/cbs/')
GO

INSERT INTO [dbo].[config_api] VALUES (N'3', N'rekening_koran2', N'http://10.2.2.2:22280/cbs/')
GO

INSERT INTO [dbo].[config_api] VALUES (N'4', N'api_baru', N'http://10.2.2.2/cbs/')
GO

INSERT INTO [dbo].[config_api] VALUES (N'5', N'pemindahBukuan', N'http://10.2.2.2:22280/cbs/index.php/Transaksi')
GO


-- ----------------------------
-- Table structure for hari_libur
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[hari_libur]') AND type IN ('U'))
	DROP TABLE [dbo].[hari_libur]
GO

CREATE TABLE [dbo].[hari_libur] (
  [KD_KASDA] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [SENIN] varchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SELASA] varchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RABU] varchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KAMIS] varchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JUMAT] varchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SABTU] varchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MINGGU] varchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[hari_libur] SET (LOCK_ESCALATION = AUTO)
GO


-- ----------------------------
-- Records of hari_libur
-- ----------------------------
INSERT INTO [dbo].[hari_libur] VALUES (N'00001', NULL, NULL, N'on', N'on', N'on', N'on', N'on')
GO

INSERT INTO [dbo].[hari_libur] VALUES (N'00002', NULL, NULL, NULL, N'on', N'on', NULL, N'0')
GO

INSERT INTO [dbo].[hari_libur] VALUES (N'00004', N'on', NULL, NULL, NULL, NULL, NULL, N'on')
GO


-- ----------------------------
-- Table structure for history_print
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[history_print]') AND type IN ('U'))
	DROP TABLE [dbo].[history_print]
GO

CREATE TABLE [dbo].[history_print] (
  [bukti_verifikasi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_KASDA] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[history_print] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of history_print
-- ----------------------------
INSERT INTO [dbo].[history_print] VALUES (N'00027', N'00001')
GO

INSERT INTO [dbo].[history_print] VALUES (N'00179', N'99999')
GO


-- ----------------------------
-- Table structure for interface
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[interface]') AND type IN ('U'))
	DROP TABLE [dbo].[interface]
GO

CREATE TABLE [dbo].[interface] (
  [KD_KASDA] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USERNAME] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [PASSWORD] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [HOST] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [DB_NAME] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[interface] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'IP COMPUTER CLIENT',
'SCHEMA', N'dbo',
'TABLE', N'interface',
'COLUMN', N'HOST'
GO


-- ----------------------------
-- Records of interface
-- ----------------------------
INSERT INTO [dbo].[interface] VALUES (N'99999', N'HIApp', N'interface2012', N'199.97.20.9', N'cms_4')
GO

INSERT INTO [dbo].[interface] VALUES (N'00006', N'sa', N'p@55word', N'199.97.20.160', N'cms_4')
GO

INSERT INTO [dbo].[interface] VALUES (N'00001', N'HIApp', N'interface2012', N'199.97.20.9', N'cms_4')
GO


-- ----------------------------
-- Table structure for log_activity
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[log_activity]') AND type IN ('U'))
	DROP TABLE [dbo].[log_activity]
GO

CREATE TABLE [dbo].[log_activity] (
  [username] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [activity] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal] datetime  NULL,
  [old_value] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [new_value] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_kasda] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[log_activity] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'value lama',
'SCHEMA', N'dbo',
'TABLE', N'log_activity',
'COLUMN', N'old_value'
GO

EXEC sp_addextendedproperty
'MS_Description', N'value baru',
'SCHEMA', N'dbo',
'TABLE', N'log_activity',
'COLUMN', N'new_value'
GO


-- ----------------------------
-- Records of log_activity
-- ----------------------------
INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''102384/SP2D/2019'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-23 10:32:09.000', N'{"No_SP2D":"102384\/SP2D\/2019"}', N'{"kd_billing":["1000","1002"]}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''102384/SP2D/2019'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-23 10:37:39.000', N'{"No_SP2D":"102384\/SP2D\/2019"}', N'{"kd_billing":["1000","1002"]}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''102384/SP2D/2019'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-23 10:38:10.000', N'{"No_SP2D":"102384\/SP2D\/2019"}', N'{"kd_billing":["1000","1002"]}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-24 04:28:57.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 03:21:59.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"1900-01-01","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 03:27:18.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"1900-01-01","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 03:30:48.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 03:34:28.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 03:35:56.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:16:55.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:17:46.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'diana', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-30 09:34:02.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-04-28","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"diana"}', NULL)
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-05-04 04:00:32.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-04-28","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:16:08.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:23:14.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:23:25.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:23:54.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:25:51.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:26:28.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'diana', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-30 10:05:27.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-04-28","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"diana"}', NULL)
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-05-04 04:04:44.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-04-28","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:18:40.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:20:13.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:20:24.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:20:34.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO

INSERT INTO [dbo].[log_activity] VALUES (N'CMS01', N'Mencairkan sp2d ''10236'', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya', N'2020-04-28 04:21:55.000', N'{"No_SP2D":"10236"}', N'{"TglCair":"2020-06-20","STATUS":3,"Status_Cair":1,"USER_PENCAIRAN":"CMS01"}', N'99999')
GO


-- ----------------------------
-- Table structure for log_import_trxSPM
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[log_import_trxSPM]') AND type IN ('U'))
	DROP TABLE [dbo].[log_import_trxSPM]
GO

CREATE TABLE [dbo].[log_import_trxSPM] (
  [username] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [aktifitas] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [date] datetime  NULL
)
GO

ALTER TABLE [dbo].[log_import_trxSPM] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of log_import_trxSPM
-- ----------------------------
INSERT INTO [dbo].[log_import_trxSPM] VALUES (N'CMS01', N'Berhasil import data trxSPM dari SIMDA_4', N'Rekening 0270705455 Tidak Ditemukan.', N'2020-04-16 06:04:01.000')
GO

INSERT INTO [dbo].[log_import_trxSPM] VALUES (N'CMS01', N'Berhasil import data trxSPM dari SIMDA_4', N'Rekening Pasif, Nama nasabah sesuai : MUHAMMAD KHAIRUN', N'2020-04-16 06:04:02.000')
GO

INSERT INTO [dbo].[log_import_trxSPM] VALUES (N'CMS01', N'Berhasil import data trxSPM dari SIMDA_4', N'Rekening 0270705455 Tidak Ditemukan.', N'2020-04-16 06:04:30.000')
GO

INSERT INTO [dbo].[log_import_trxSPM] VALUES (N'CMS01', N'Berhasil import data trxSPM dari SIMDA_4', N'Rekening Aktif, Nama nasabah sesuai : NURDIANA', N'2020-04-16 06:04:31.000')
GO

INSERT INTO [dbo].[log_import_trxSPM] VALUES (N'CMS01', N'Berhasil import data trxSPM dari SIMDA_4', N'Rekening Aktif, Nama nasabah sesuai : NURDIANA', N'2020-04-16 06:04:03.000')
GO

INSERT INTO [dbo].[log_import_trxSPM] VALUES (N'CMS01', N'Berhasil import data trxSPM dari SIMDA_4', N'Rekening Pasif, Nama nasabah sesuai : MUHAMMAD KHAIRUN', N'2020-04-16 06:04:31.000')
GO


-- ----------------------------
-- Table structure for log_pencairan
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[log_pencairan]') AND type IN ('U'))
	DROP TABLE [dbo].[log_pencairan]
GO

CREATE TABLE [dbo].[log_pencairan] (
  [no_sp2d] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rekening] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nilai] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jenis_transaksi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [status] int  NULL
)
GO

ALTER TABLE [dbo].[log_pencairan] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'1= behasil, 2 = tertunda, 0=belum di proses',
'SCHEMA', N'dbo',
'TABLE', N'log_pencairan',
'COLUMN', N'status'
GO


-- ----------------------------
-- Records of log_pencairan
-- ----------------------------
INSERT INTO [dbo].[log_pencairan] VALUES (N'10236', N'0121300015', N'24300000.0000', N'D', N'0')
GO

INSERT INTO [dbo].[log_pencairan] VALUES (N'10236', N'0121300015', N'24300000.0000', N'K', N'0')
GO

INSERT INTO [dbo].[log_pencairan] VALUES (N'10236', N'0121300015', N'24300000.0000', N'D', N'0')
GO

INSERT INTO [dbo].[log_pencairan] VALUES (N'10236', N'0129911123', N'24300000.0000', N'K', N'0')
GO

INSERT INTO [dbo].[log_pencairan] VALUES (N'10236', N'0121300015', N'24300000.0000', N'D', N'0')
GO

INSERT INTO [dbo].[log_pencairan] VALUES (N'10236', N'0129911123', N'24300000.0000', N'K', N'0')
GO


-- ----------------------------
-- Table structure for pemeliharaan_konfigurasi
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[pemeliharaan_konfigurasi]') AND type IN ('U'))
	DROP TABLE [dbo].[pemeliharaan_konfigurasi]
GO

CREATE TABLE [dbo].[pemeliharaan_konfigurasi] (
  [NAMA_KONFIGURASI] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [VALUE] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[pemeliharaan_konfigurasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of pemeliharaan_konfigurasi
-- ----------------------------
INSERT INTO [dbo].[pemeliharaan_konfigurasi] VALUES (N'LIMIT_IMPORT', N'75')
GO

INSERT INTO [dbo].[pemeliharaan_konfigurasi] VALUES (N'INTERVAL_SIMDA', N'3')
GO


-- ----------------------------
-- Table structure for pemeliharaan_validasi_interface
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[pemeliharaan_validasi_interface]') AND type IN ('U'))
	DROP TABLE [dbo].[pemeliharaan_validasi_interface]
GO

CREATE TABLE [dbo].[pemeliharaan_validasi_interface] (
  [kd_kasda] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id_validasi_interface] int  NOT NULL,
  [jenis_validasi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[pemeliharaan_validasi_interface] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for ref_approval_rek_kasda
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_approval_rek_kasda]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_approval_rek_kasda]
GO

CREATE TABLE [dbo].[ref_approval_rek_kasda] (
  [NM_PEMILIK] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NO_REK] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [STATUS] int  NOT NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_SUMBER_DANA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_DATA] int  IDENTITY(1,1) NOT NULL,
  [KD_CAB] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[ref_approval_rek_kasda] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_approval_rek_kasda
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_approval_rek_kasda] ON
GO

INSERT INTO [dbo].[ref_approval_rek_kasda] ([NM_PEMILIK], [USER_UPDATE], [NO_REK], [STATUS], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA], [KD_CAB]) VALUES (N'KAS DAERAH PEMERINTAH KAB DOMP', N'', N'0072101744008', N'0', N'', N'00004', N'01', N'6', N'021')
GO

INSERT INTO [dbo].[ref_approval_rek_kasda] ([NM_PEMILIK], [USER_UPDATE], [NO_REK], [STATUS], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA], [KD_CAB]) VALUES (N'KAS DAERAH PEMERINTAH KAB DOMP', N'CMS01', N'0072101744008', N'0', N'CMS01', N'00004', N'01', N'7', N'021')
GO

SET IDENTITY_INSERT [dbo].[ref_approval_rek_kasda] OFF
GO


-- ----------------------------
-- Table structure for ref_bank
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_bank]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_bank]
GO

CREATE TABLE [dbo].[ref_bank] (
  [KD_BANK] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NM_BANK] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TAG] nchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_DATA] int  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[ref_bank] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_bank
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_bank] ON
GO

INSERT INTO [dbo].[ref_bank] ([KD_BANK], [NM_BANK], [USER_UPDATE], [USER_INPUT], [TAG], [KD_DATA]) VALUES (N'003', N'BANK ENXPORT INDONESIA', N'CMS01', N'CMS01', NULL, N'14')
GO

INSERT INTO [dbo].[ref_bank] ([KD_BANK], [NM_BANK], [USER_UPDATE], [USER_INPUT], [TAG], [KD_DATA]) VALUES (N'002', N'BANK RAKYAT INDONESIA', N'CMS01', N'CMS01', NULL, N'2')
GO

INSERT INTO [dbo].[ref_bank] ([KD_BANK], [NM_BANK], [USER_UPDATE], [USER_INPUT], [TAG], [KD_DATA]) VALUES (N'128', N'BPD NUSA TENGGARA BARAT', N'CMS01', N'CMS01', NULL, N'15')
GO

INSERT INTO [dbo].[ref_bank] ([KD_BANK], [NM_BANK], [USER_UPDATE], [USER_INPUT], [TAG], [KD_DATA]) VALUES (N'001', N'BANK INDINESIA', N'CMS01', N'CMS01', NULL, N'4')
GO

INSERT INTO [dbo].[ref_bank] ([KD_BANK], [NM_BANK], [USER_UPDATE], [USER_INPUT], [TAG], [KD_DATA]) VALUES (N'129', N'BPD BALI', N'CMS01', N'CMS01', NULL, N'16')
GO

INSERT INTO [dbo].[ref_bank] ([KD_BANK], [NM_BANK], [USER_UPDATE], [USER_INPUT], [TAG], [KD_DATA]) VALUES (N'130', N'BPD NUSA TENGGARA TIMUR', N'CMS01', N'CMS01', NULL, N'17')
GO

SET IDENTITY_INSERT [dbo].[ref_bank] OFF
GO


-- ----------------------------
-- Table structure for ref_bidang
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_bidang]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_bidang]
GO

CREATE TABLE [dbo].[ref_bidang] (
  [KD_URUSAN] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_BIDANG] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NM_BIDANG] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_KASDA] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_DATA_BIDANG] int  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[ref_bidang] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_bidang
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_bidang] ON
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'1', N'01', N'000001', N'000001', N'Pendidikan', NULL, N'1')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'1', N'02', N'000001', N'000001', N'Kesehatan', NULL, N'2')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'1', N'03', N'000001', N'000001', N'Pekerjaan Umum dan Penataan Ruang', NULL, N'3')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'1', N'04', N'000001', N'000001', N'Perumahan Rakyat dan Kawasan Pemukiman', NULL, N'4')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'1', N'05', N'000001', N'000001', N'Ketentraman dan Ketertiban Umum serta Perlindungan Masyarakat', NULL, N'5')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'1', N'06', N'000001', N'000001', N'Sosial', NULL, N'6')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'01', N'000001', N'000001', N'Tenaga Kerja', NULL, N'7')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'02', N'000001', N'000001', N'Pemberdayaan Perempuan dan Perlindungan Anak', NULL, N'8')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'03', N'000001', N'000001', N'Pangan', NULL, N'9')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'05', N'000001', N'000001', N'Lingkungan Hidup', NULL, N'10')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'06', N'000001', N'000001', N'Administrasi Kependudukan dan Capil', NULL, N'11')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'07', N'000001', N'000001', N'Pemberdayaan Masyarakat Desa', NULL, N'12')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'08', N'000001', N'000001', N'Pengendalian Penduduk dan Keluarga Berencana', NULL, N'13')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'09', N'000001', N'000001', N'Perhubungan', NULL, N'14')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'10', N'000001', N'000001', N'Komunikasi dan Informatika', NULL, N'15')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'11', N'000001', N'000001', N'Koperasi, Usaha Kecil dan Menengah', NULL, N'16')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'12', N'000001', N'000001', N'Penanaman Modal', NULL, N'17')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'13', N'000001', N'000001', N'Kepemudaan dan Olah Raga', NULL, N'18')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'2', N'18', N'000001', N'000001', N'Kearsipan', NULL, N'19')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'3', N'01', N'000001', N'000001', N'Kelautan dan Perikanan', NULL, N'20')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'3', N'02', N'000001', N'000001', N'Pariwisata', NULL, N'21')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'3', N'03', N'000001', N'000001', N'Pertanian', NULL, N'22')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'3', N'06', N'000001', N'000001', N'Perdagangan', NULL, N'23')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'4', N'01', N'000001', N'000001', N'Administrasi Pemerintahan', NULL, N'24')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'4', N'02', N'000001', N'000001', N'Pengawasan', NULL, N'25')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'4', N'03', N'000001', N'000001', N'Perencanaan', NULL, N'26')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'4', N'04', N'000001', N'000001', N'Keuangan', NULL, N'27')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'4', N'05', N'000001', N'000001', N'Kepegawaian', NULL, N'28')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'4', N'07', N'000001', N'000001', N'Penelitian dan Pengembangan', NULL, N'29')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'4', N'02', N'000001', N'000001', N'Pengawasan', NULL, N'30')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'4', N'03', N'000001', N'000001', N'Perencanaan', NULL, N'31')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'4', N'04', N'000001', N'000001', N'Keuangan', NULL, N'32')
GO

INSERT INTO [dbo].[ref_bidang] ([KD_URUSAN], [KD_BIDANG], [USER_UPDATE], [USER_INPUT], [NM_BIDANG], [KD_KASDA], [KD_DATA_BIDANG]) VALUES (N'4', N'05', N'000001', N'000001', N'Kepegawaian', NULL, N'33')
GO

SET IDENTITY_INSERT [dbo].[ref_bidang] OFF
GO


-- ----------------------------
-- Table structure for ref_cab
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_cab]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_cab]
GO

CREATE TABLE [dbo].[ref_cab] (
  [KD_CAB] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [ALAMAT_KANTOR] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [URAIAN] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KOTA] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ref_cab] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_cab
-- ----------------------------
INSERT INTO [dbo].[ref_cab] VALUES (N'021', N'', N'CABANG SURABAYA RAYA DARMO', N'')
GO

INSERT INTO [dbo].[ref_cab] VALUES (N'022', N'', N'CABANG gerung', N'')
GO

INSERT INTO [dbo].[ref_cab] VALUES (N'023', N'', N'CABANG LEPEM LUNYUK', N'')
GO

INSERT INTO [dbo].[ref_cab] VALUES (N'500', N'', N'BANK NTB UNIT USAHA SYARIAH', N'')
GO


-- ----------------------------
-- Table structure for ref_jam_transaksi
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_jam_transaksi]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_jam_transaksi]
GO

CREATE TABLE [dbo].[ref_jam_transaksi] (
  [KD_KASDA] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [JAM_BUKA] time(7)  NULL,
  [JAM_TUTUP] time(7)  NULL
)
GO

ALTER TABLE [dbo].[ref_jam_transaksi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_jam_transaksi
-- ----------------------------
INSERT INTO [dbo].[ref_jam_transaksi] VALUES (N'00001', N'01:31:00.0000000', N'14:08:00.0000000')
GO

INSERT INTO [dbo].[ref_jam_transaksi] VALUES (N'00002', N'01:33:00.0000000', N'03:14:00.0000000')
GO

INSERT INTO [dbo].[ref_jam_transaksi] VALUES (N'00011', N'01:23:00.0000000', N'16:23:00.0000000')
GO


-- ----------------------------
-- Table structure for ref_jenis_spm
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_jenis_spm]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_jenis_spm]
GO

CREATE TABLE [dbo].[ref_jenis_spm] (
  [KD_JENIS_SPM] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NM_JENIS_SPM] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_DATA] int  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[ref_jenis_spm] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_jenis_spm
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_jenis_spm] ON
GO

INSERT INTO [dbo].[ref_jenis_spm] ([KD_JENIS_SPM], [NM_JENIS_SPM], [USER_UPDATE], [USER_INPUT], [KD_DATA]) VALUES (N'TU', N'TAMBAH UANG PERSEDIAAN', N'', N'', N'2')
GO

INSERT INTO [dbo].[ref_jenis_spm] ([KD_JENIS_SPM], [NM_JENIS_SPM], [USER_UPDATE], [USER_INPUT], [KD_DATA]) VALUES (N'LS', N'LANGSUNG', N'', N'', N'3')
GO

INSERT INTO [dbo].[ref_jenis_spm] ([KD_JENIS_SPM], [NM_JENIS_SPM], [USER_UPDATE], [USER_INPUT], [KD_DATA]) VALUES (N'GU', N'GANTI UANG PERSEDIAAN', N'', N'', N'4')
GO

INSERT INTO [dbo].[ref_jenis_spm] ([KD_JENIS_SPM], [NM_JENIS_SPM], [USER_UPDATE], [USER_INPUT], [KD_DATA]) VALUES (N'UP', N'UANG PERSEDIAAN', N'CMS01', N'CMS01', N'6')
GO

SET IDENTITY_INSERT [dbo].[ref_jenis_spm] OFF
GO


-- ----------------------------
-- Table structure for ref_kasda
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_kasda]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_kasda]
GO

CREATE TABLE [dbo].[ref_kasda] (
  [NO_TELP_1] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [LOGO_KASDA] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NO_TELP_2] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NM_KASDA] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [ALAMAT_KASDA] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IMAGE] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NPWP] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_INPUT] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NO_FAX] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TGL_IMPLEMENTASI] datetime  NOT NULL,
  [KOTA] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_KASDA] nchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KEPALA_DAERAH] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JABATAN] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SEKDA] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NIP_SEKDA] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KBUD] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NIP_KBUD] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PPKD] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NIP_PPKD] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BUD] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NIP_BUD] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[ref_kasda] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_kasda
-- ----------------------------
INSERT INTO [dbo].[ref_kasda] VALUES (N'082938', NULL, N'082938', N'PEMERINTAH KOTA MATARAM', N'Mataram', N'00001', NULL, N'082938', N'00001', N'082938', N'2019-07-24 11:07:29.000', N'Mataram', N'00001', N'', N'', N'', N'', N'', N'', N'', N'', N'082938', N'082938')
GO

INSERT INTO [dbo].[ref_kasda] VALUES (N'003909', NULL, N'3298', N'PEMERINTAH KABUPATEN LOMBOK BARAT', N'LOMBOK BARAT', N'00001', NULL, N'89080', N'00001', N'', N'2019-07-25 10:07:45.000', N'KURANG TAU', N'00002', N'', N'', N'', N'', N'', N'', N'', N'', N'89080', N'809809')
GO

INSERT INTO [dbo].[ref_kasda] VALUES (N'0083873', NULL, N'982898', N'PEMKAB LOMBOK UTARA', N'SUMBAWA', N'00001', NULL, N'898928', N'00001', N'29888', N'2019-07-30 08:07:35.000', N'SUMBAWA', N'00004', N'', N'', N'', N'', N'', N'', N'', N'', N'UBDURRAHMAN', N'82398')
GO

INSERT INTO [dbo].[ref_kasda] VALUES (N'029488', NULL, N'07897', N'PEMERINTAH KOTA BIMA', N'BIMA', N'00001', NULL, N'4214', N'00001', N'987', N'2019-08-16 09:08:07.000', N'BIMA', N'00011', N'421', N'', N'', N'', N'4214', N'', N'', N'', N'421442', N'2142')
GO

INSERT INTO [dbo].[ref_kasda] VALUES (N'7715415', NULL, N'7766879', N'SUPER USER', N'Jl Pejanggik No.30 Mataram', N'00001', NULL, N'0000', N'00001', N'87867698', N'2019-07-30 09:07:04.000', N'Jakarta', N'99999', N'', N'', N'', N'', N'', N'', N'', N'', N'0', N'0')
GO


-- ----------------------------
-- Table structure for ref_kd_konfigurasi_kasda
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_kd_konfigurasi_kasda]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_kd_konfigurasi_kasda]
GO

CREATE TABLE [dbo].[ref_kd_konfigurasi_kasda] (
  [KD_KONFIGURASI] int  IDENTITY(1,1) NOT NULL,
  [NM_KONFIGURASI] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[ref_kd_konfigurasi_kasda] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_kd_konfigurasi_kasda
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_kd_konfigurasi_kasda] ON
GO

INSERT INTO [dbo].[ref_kd_konfigurasi_kasda] ([KD_KONFIGURASI], [NM_KONFIGURASI]) VALUES (N'1', N'JENIS KERTAS')
GO

SET IDENTITY_INSERT [dbo].[ref_kd_konfigurasi_kasda] OFF
GO


-- ----------------------------
-- Table structure for ref_konfigurasi_kasda
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_konfigurasi_kasda]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_konfigurasi_kasda]
GO

CREATE TABLE [dbo].[ref_konfigurasi_kasda] (
  [KD_DATA] int  IDENTITY(1,1) NOT NULL,
  [VALUE] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NM_KONFIGURASI] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_KASDA] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ref_konfigurasi_kasda] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_konfigurasi_kasda
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_konfigurasi_kasda] ON
GO

INSERT INTO [dbo].[ref_konfigurasi_kasda] ([KD_DATA], [VALUE], [NM_KONFIGURASI], [USER_INPUT], [USER_UPDATE], [KD_KASDA]) VALUES (N'1', N'A4', N'PENGATURAN KERTAS', NULL, N'CMS01', N'00004')
GO

SET IDENTITY_INSERT [dbo].[ref_konfigurasi_kasda] OFF
GO


-- ----------------------------
-- Table structure for ref_map
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_map]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_map]
GO

CREATE TABLE [dbo].[ref_map] (
  [URAIAN] text COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_MAP] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_DATA] int  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[ref_map] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_map
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_map] ON
GO

INSERT INTO [dbo].[ref_map] ([URAIAN], [USER_UPDATE], [USER_INPUT], [KD_MAP], [KD_DATA]) VALUES (N'PAJAK 10%', N'CMS01', N'CMS01', N'711101', N'1')
GO

INSERT INTO [dbo].[ref_map] ([URAIAN], [USER_UPDATE], [USER_INPUT], [KD_MAP], [KD_DATA]) VALUES (N'IWP 8%', N'CMS01', N'CMS01', N'711111', N'2')
GO

INSERT INTO [dbo].[ref_map] ([URAIAN], [USER_UPDATE], [USER_INPUT], [KD_MAP], [KD_DATA]) VALUES (N'TASPEN', N'', N'', N'71121', N'4')
GO

INSERT INTO [dbo].[ref_map] ([URAIAN], [USER_UPDATE], [USER_INPUT], [KD_MAP], [KD_DATA]) VALUES (N'ASKES', N'CMS01', N'CMS01', N'71131', N'5')
GO

INSERT INTO [dbo].[ref_map] ([URAIAN], [USER_UPDATE], [USER_INPUT], [KD_MAP], [KD_DATA]) VALUES (N'PENERIMAAN PAJAK HOTEL 10%', N'CMS01', N'CMS01', N'711101', N'6')
GO

INSERT INTO [dbo].[ref_map] ([URAIAN], [USER_UPDATE], [USER_INPUT], [KD_MAP], [KD_DATA]) VALUES (N'DENDA KETERLAMBATAN PENYELESAIAN PEKERJAAN', N'CMS01', N'CMS01', N'71111', N'7')
GO

SET IDENTITY_INSERT [dbo].[ref_map] OFF
GO


-- ----------------------------
-- Table structure for ref_maping_map
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_maping_map]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_maping_map]
GO

CREATE TABLE [dbo].[ref_maping_map] (
  [KD_DATA] int  IDENTITY(1,1) NOT NULL,
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_MAP] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_MAP_SIMDA] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[ref_maping_map] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_maping_map
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_maping_map] ON
GO

INSERT INTO [dbo].[ref_maping_map] ([KD_DATA], [KD_KASDA], [KD_MAP], [KD_MAP_SIMDA], [USER_UPDATE], [USER_INPUT]) VALUES (N'1', N'00001', N'71121', N'71121', N'', N'')
GO

INSERT INTO [dbo].[ref_maping_map] ([KD_DATA], [KD_KASDA], [KD_MAP], [KD_MAP_SIMDA], [USER_UPDATE], [USER_INPUT]) VALUES (N'5', N'99999', N'71131', N'0001', N'CMS01', N'CMS01')
GO

INSERT INTO [dbo].[ref_maping_map] ([KD_DATA], [KD_KASDA], [KD_MAP], [KD_MAP_SIMDA], [USER_UPDATE], [USER_INPUT]) VALUES (N'3', N'00001', N'71121', N'71121', N'', N'')
GO

INSERT INTO [dbo].[ref_maping_map] ([KD_DATA], [KD_KASDA], [KD_MAP], [KD_MAP_SIMDA], [USER_UPDATE], [USER_INPUT]) VALUES (N'6', N'99999', N'711111', N'0002', N'CMS01', N'CMS01')
GO

INSERT INTO [dbo].[ref_maping_map] ([KD_DATA], [KD_KASDA], [KD_MAP], [KD_MAP_SIMDA], [USER_UPDATE], [USER_INPUT]) VALUES (N'7', N'99999', N'71111', N'0003', N'CMS01', N'CMS01')
GO

INSERT INTO [dbo].[ref_maping_map] ([KD_DATA], [KD_KASDA], [KD_MAP], [KD_MAP_SIMDA], [USER_UPDATE], [USER_INPUT]) VALUES (N'8', N'00011', N'711101', N'0001', N'BIM01', N'BIM01')
GO

INSERT INTO [dbo].[ref_maping_map] ([KD_DATA], [KD_KASDA], [KD_MAP], [KD_MAP_SIMDA], [USER_UPDATE], [USER_INPUT]) VALUES (N'9', N'00011', N'711111', N'0002', N'BIM01', N'BIM01')
GO

SET IDENTITY_INSERT [dbo].[ref_maping_map] OFF
GO


-- ----------------------------
-- Table structure for ref_menu
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_menu]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_menu]
GO

CREATE TABLE [dbo].[ref_menu] (
  [id_menu] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [menu_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [class_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [level_menu] int  NULL,
  [parent_menu] int  NULL,
  [icon] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ref_menu] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'folder/controller',
'SCHEMA', N'dbo',
'TABLE', N'ref_menu',
'COLUMN', N'class_name'
GO


-- ----------------------------
-- Records of ref_menu
-- ----------------------------
INSERT INTO [dbo].[ref_menu] VALUES (N'1000', N'PARAMETER', N'parameter', N'1', NULL, N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1001', N'Organisasi', N'parameterorganisasi', N'2', N'1000', N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1003', N'Rekening Bank', N'parameterrekeningbank', N'2', N'1000', N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1006', N'Pemeliharaan Bank', N'parameter/PemeliharaanBank', N'2', N'1000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1018', N'Pemeliharaan Jenis SPM', N'parameter/PemeliharaanJenisSPM', N'2', N'1000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1020', N'Pemeliharaan MAP', N'parameter/PemeliharaanMAP', N'2', N'1000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1101', N'Pemeliharaan Kasda', N'parameterorganisasi/PemeliharaanKasda', N'3', N'1001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1102', N'Pemeliharaan Urusan', N'parameterorganisasi/PemeliharaanUrusan', N'3', N'1001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1103', N'Pemeliharaan Bidang', N'parameterorganisasi/PemeliharaanBidang', N'3', N'1001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1104', N'Pemeliharaan Unit', N'parameterorganisasi/PemeliharaanUnit', N'3', N'1001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1105', N'Pemeliharaan Sub Unit', N'parameterorganisasi/PemeliharaanSubUnit', N'3', N'1001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1106', N'Import SKPD', N'parameterorganisasi/Skpd', N'3', N'1001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1305', N'Pemeliharaan Rek Potongan', N'parameterrekeningbank/Rekening_potongan', N'3', N'1003', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1306', N'Pemeliharaan Rek Sumber', N'parameterrekeningbank/Rekening_sumber', N'3', N'1003', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1307', N'Pemeliharaan Rek Kasda', N'parameterrekeningbank/Rekening_kasda', N'3', N'1003', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1311', N'Pemeliharaan Rekening SKPD', N'parameterrekeningbank/Rekening_skpd', N'3', N'1003', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1340', N'Potongan Transaksi', N'parameter/Potongantransaksi', N'2', N'1000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1353', N'Approval Rekening Kasda', N'parameter/Aproval_rek_kasda', N'2', N'1000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1354', N'Pemeliharaan Akses Rekening Koran', N'parameter/Pemeliharaan_akses_rek_koran', N'2', N'1000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1357', N'Mapping Map', N'parameter/Maping_Map', N'2', N'1000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'1359', N'Konfigurasi Kasda', N'parameter/KonfigurasiKasda', N'2', N'1000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'2000', N'TRANSAKSI', N'transaksi', N'1', NULL, N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'2400', N'SP2D (Interface SIMDA)', N'transaksi', N'2', N'2000', N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'2402', N'Verifikasi SP2D', N'transaksi/Verifikasi_sp2d', N'3', N'2400', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'2404', N'Koreksi Verifikasi SP2D', N'transaksi/Koreksi_verifikasi', N'3', N'2400', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'2405', N'Gateway Server', N'transaksi/Gateway_server', N'3', N'2400', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'2408', N'Hapus SP2D', N'transaksi/Hapus_sp2d', N'3', N'2400', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'2410', N'Pencairan SP2D', N'transaksi/Pencairan_sp2d', N'3', N'2400', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'2412', N'Gateway Transaksi SPM', N'transaksi/Gateway_trxSPM', N'3', N'2400', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3000', N'LAPORAN', N'Laporan/LapTrsans', N'1', NULL, N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3001', N'Transaksi', N'Laporan/LapTrsans/', N'2', N'3000', N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3002', N'Security', N'Laporan/lapSec/', N'2', N'3000', N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3003', N'Parameter', N'Laporan/lapParameter/', N'2', N'3000', N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3010', N'Daftar SKPD', N'Laporan/parameter/daftarSKPD', N'3', N'3003', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3028', N'Laporan Rekening Koran', N'Laporan/LapTrsans/Laporan_rekKoran', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3101', N'Daftar SKPD Sudah cair', N'Laporan/LapTrsans/sp2d_sudah_cair', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3102', N'Daftar SKPD Belum Cair', N'Laporan/LapTrsans/sp2d_belum_cair', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3103', N'Laporan Rekap Pencairan SP2D', N'Laporan/LapTrsans/rekap_pencairan_sp2d', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3104', N'Laporan Status Per SP2D', N'Laporan/LapTrsans/Status_per_sp2d', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3107', N'Laporan Koreksi Verifikasi SP2D', N'Laporan/LapTrsans/Koreksi_sp2d', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3109', N'Rekap Pembukaan SP2D', N'Laporan/LapTrsans/LapPembukaansp2d', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3110', N'Rekap Verifikasi SP2D', N'Laporan/LapTrsans/LapVerifikasi', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3112', N'Cetak Ulang', N'Laporan/LapTrsans/CetakUlang', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3114', N'Daftar Status SP2D', N'Laporan/LapTrsans/DaftarStatusSP2D', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3116', N'Laporan SP2D Gagal Import', N'Laporan/LapTrsans/Sp2dgagalImport', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3117', N'Laporan SP2D Berhasil Import', N'Laporan/LapTrsans/Sp2dBerhasilImport', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3119', N'Laporan Kolektif Potongan dan Pajak', N'laporan/LapTrsans/KolektifPotongandanPajak', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3120', N'Laporan Rekap Pajak SP2D', N'laporan/LapTrsans/RekapPajakSP2D', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'3121', N'Laporan Rincian Pajak SP2D', N'laporan/LapTrsans/RincianPajakSP2D', N'3', N'3001', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4000', N'SECURITY', N'pengamanan', N'1', NULL, N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4004', N'Pemeliharaan User', N'pengamanan/PemeliharaanUser', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4005', N'Pemeliharaan Wewenang', N'pengamanan/PemeliharaanWewenang', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4006', N'Pemeliharaan Terminal', N'pengamanan/PemeliharaanTerminal', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4010', N'Pemeliharaan Menu', N'pengamanan/PemeliharaanMenu', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4011', N'Pemeliharaan Wewenang Menu', N'pengamanan/PemeliharaanWwnangMenu', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4012', N'Pemeliharaan Terminal User', N'pengamanan/PemeliharaanTerminalUser', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4013', N'Pemeliharaan Wewenang User', N'pengamanan/PemeliharaanWwnangUser', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4014', N'Change Password', N'pengamanan/ChangePassword', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4015', N'Override Password', N'pengamanan/OverridePassword', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4016', N'Pemeliharaan Hari Libur', N'pengamanan/PemeliharaanHariLibur', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4017', N'Pemeliharaan Tanggal Libur', N'pengamanan/PemeliharaanTanggalLibur', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4018', N'Pemeliharaan Jam Transaksi', N'pengamanan/PemeliharaanJamTransaksi', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4019', N'Audit Trail', N'pengamanan/AuditTrail', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4020', N'Pembukaan Blokir User', N'pengamanan/PembukaanBlokirUser', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4021', N'Approval User Admin', N'pengamanan/ApprovalUserAdmin', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4023', N'Pemeliharaan Validasi Interface', N'pengamanan/PemeliharaanValidasiInterface', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'4024', N'Pemeliharaan Konfigurasi', N'pengamanan/PemeliharaanKonfigurasi', N'2', N'4000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'5000', N'UTILITY', N'Utility', N'1', NULL, N'folder')
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'5001', N'Pesan Masuk', N'Utility/pesan_masuk', N'2', N'5000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'5002', N'Kirim Pesan', N'Utility/kirim_pesan', N'2', N'5000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'5003', N'Pemeliharaan pengumuman', N'Utility/pemeliharaan_pengumuman', N'2', N'5000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'5005', N'Monitoring Saldo', N'Utility/monitoring_saldo', N'2', N'5000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'5006', N'Monitoring SP2D', N'Utility/monitoring_sp2d', N'2', N'5000', NULL)
GO

INSERT INTO [dbo].[ref_menu] VALUES (N'9038', N'entry', N'transaksi/Pembukaan_sp2d', N'3', N'2400', NULL)
GO


-- ----------------------------
-- Table structure for ref_pemeliharaan_akses_rek_koran
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_pemeliharaan_akses_rek_koran]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_pemeliharaan_akses_rek_koran]
GO

CREATE TABLE [dbo].[ref_pemeliharaan_akses_rek_koran] (
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NO_REK] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [ADMIN_REK] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_DATA] int  IDENTITY(1,1) NOT NULL,
  [JENIS_REK] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ref_pemeliharaan_akses_rek_koran] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_pemeliharaan_akses_rek_koran
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_pemeliharaan_akses_rek_koran] ON
GO

INSERT INTO [dbo].[ref_pemeliharaan_akses_rek_koran] ([USER_INPUT], [USER_UPDATE], [NO_REK], [KD_KASDA], [ADMIN_REK], [KD_DATA], [JENIS_REK]) VALUES (N'CMS01', NULL, N'0052100052013', N'00011', N'BIM01', N'36', NULL)
GO

INSERT INTO [dbo].[ref_pemeliharaan_akses_rek_koran] ([USER_INPUT], [USER_UPDATE], [NO_REK], [KD_KASDA], [ADMIN_REK], [KD_DATA], [JENIS_REK]) VALUES (N'CMS01', NULL, N'0052220814103', N'00011', N'BIM01', N'37', NULL)
GO

INSERT INTO [dbo].[ref_pemeliharaan_akses_rek_koran] ([USER_INPUT], [USER_UPDATE], [NO_REK], [KD_KASDA], [ADMIN_REK], [KD_DATA], [JENIS_REK]) VALUES (N'CMS01', NULL, N'0012299581015', N'00004', N'', N'38', NULL)
GO

INSERT INTO [dbo].[ref_pemeliharaan_akses_rek_koran] ([USER_INPUT], [USER_UPDATE], [NO_REK], [KD_KASDA], [ADMIN_REK], [KD_DATA], [JENIS_REK]) VALUES (N'CMS01', NULL, N'0012203130029', N'99999', N'CMS01', N'42', NULL)
GO

SET IDENTITY_INSERT [dbo].[ref_pemeliharaan_akses_rek_koran] OFF
GO


-- ----------------------------
-- Table structure for ref_potongan_transaksi
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_potongan_transaksi]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_potongan_transaksi]
GO

CREATE TABLE [dbo].[ref_potongan_transaksi] (
  [KD_DATA] int  IDENTITY(1,1) NOT NULL,
  [BATAS_BAWAH] float(53)  NULL,
  [BATAS_ATAS] float(53)  NULL,
  [POTONGAN] float(53)  NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ref_potongan_transaksi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_potongan_transaksi
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_potongan_transaksi] ON
GO

INSERT INTO [dbo].[ref_potongan_transaksi] ([KD_DATA], [BATAS_BAWAH], [BATAS_ATAS], [POTONGAN], [USER_UPDATE], [USER_INPUT]) VALUES (N'6', N'0', N'10000000', N'12500', NULL, N'CMS01')
GO

INSERT INTO [dbo].[ref_potongan_transaksi] ([KD_DATA], [BATAS_BAWAH], [BATAS_ATAS], [POTONGAN], [USER_UPDATE], [USER_INPUT]) VALUES (N'7', N'10000000', N'35000000', N'17500', NULL, N'CMS01')
GO

INSERT INTO [dbo].[ref_potongan_transaksi] ([KD_DATA], [BATAS_BAWAH], [BATAS_ATAS], [POTONGAN], [USER_UPDATE], [USER_INPUT]) VALUES (N'8', N'35000000', N'10000000', N'20000', NULL, N'CMS01')
GO

SET IDENTITY_INSERT [dbo].[ref_potongan_transaksi] OFF
GO


-- ----------------------------
-- Table structure for ref_rek_kasda
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_rek_kasda]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_rek_kasda]
GO

CREATE TABLE [dbo].[ref_rek_kasda] (
  [NM_PEMILIK] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NO_REK] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [STATUS] int  NOT NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_SUMBER_DANA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_DATA] int  IDENTITY(1,1) NOT NULL,
  [KD_CAB] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [JENIS_REK] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ref_rek_kasda] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_rek_kasda
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_rek_kasda] ON
GO

INSERT INTO [dbo].[ref_rek_kasda] ([NM_PEMILIK], [USER_UPDATE], [NO_REK], [STATUS], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA], [KD_CAB], [JENIS_REK]) VALUES (N'REK KAS UMUM DAERAH KOTA BIMA', N'', N'0052100102025', N'1', N'', N'00011', N'04', N'7', N'021', NULL)
GO

INSERT INTO [dbo].[ref_rek_kasda] ([NM_PEMILIK], [USER_UPDATE], [NO_REK], [STATUS], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA], [KD_CAB], [JENIS_REK]) VALUES (N'BENDAHARA UMUM RSUD KOTA BIMA', N'', N'0052220814103', N'1', N'', N'00011', N'04', N'8', N'022', NULL)
GO

INSERT INTO [dbo].[ref_rek_kasda] ([NM_PEMILIK], [USER_UPDATE], [NO_REK], [STATUS], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA], [KD_CAB], [JENIS_REK]) VALUES (N'DANA JKN UPT PKM KUMBE', N'', N'0052100052013', N'1', N'', N'00011', N'04', N'9', N'021', NULL)
GO

INSERT INTO [dbo].[ref_rek_kasda] ([NM_PEMILIK], [USER_UPDATE], [NO_REK], [STATUS], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA], [KD_CAB], [JENIS_REK]) VALUES (N'IRFAN PRATAMA', NULL, N'0012203130029', N'1', N'CMS01', N'99999', N'02', N'10', N'500', NULL)
GO

INSERT INTO [dbo].[ref_rek_kasda] ([NM_PEMILIK], [USER_UPDATE], [NO_REK], [STATUS], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA], [KD_CAB], [JENIS_REK]) VALUES (N'NELLA ROSA SUDIANJAYA', NULL, N'0010200663314', N'1', N'MTR01', N'00001', N'01', N'12', N'021', NULL)
GO

SET IDENTITY_INSERT [dbo].[ref_rek_kasda] OFF
GO


-- ----------------------------
-- Table structure for ref_rek_potongan
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_rek_potongan]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_rek_potongan]
GO

CREATE TABLE [dbo].[ref_rek_potongan] (
  [KD_CAB] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NM_PEMILIK] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NO_REK] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [STATUS] int  NOT NULL,
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_MAP] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_DATA] int  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[ref_rek_potongan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_rek_potongan
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_rek_potongan] ON
GO

INSERT INTO [dbo].[ref_rek_potongan] ([KD_CAB], [NM_PEMILIK], [USER_UPDATE], [USER_INPUT], [NO_REK], [STATUS], [KD_KASDA], [KD_MAP], [KD_DATA]) VALUES (N'500', N'I MADE WINDIARTHA', N'', N'', N'0012299581015', N'1', N'00001', N'7111', N'4')
GO

SET IDENTITY_INSERT [dbo].[ref_rek_potongan] OFF
GO


-- ----------------------------
-- Table structure for ref_rek_skpd
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_rek_skpd]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_rek_skpd]
GO

CREATE TABLE [dbo].[ref_rek_skpd] (
  [KD_CAB] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NM_PEMILIK] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NO_REK] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [STATUS] int  NOT NULL,
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_SKPD] nvarchar(13) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_DATA] int  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[ref_rek_skpd] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_rek_skpd
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_rek_skpd] ON
GO

INSERT INTO [dbo].[ref_rek_skpd] ([KD_CAB], [NM_PEMILIK], [USER_UPDATE], [USER_INPUT], [NO_REK], [STATUS], [KD_KASDA], [KD_SKPD], [KD_DATA]) VALUES (N'023', N'I MADE WINDIARTHA', N'CMS01', N'CMS01', N'0012299581015', N'1', N'00004', N'1.01.1.4', N'1')
GO

INSERT INTO [dbo].[ref_rek_skpd] ([KD_CAB], [NM_PEMILIK], [USER_UPDATE], [USER_INPUT], [NO_REK], [STATUS], [KD_KASDA], [KD_SKPD], [KD_DATA]) VALUES (N'022', N'NELLA ROSA SUDIANJAYA', N'MTR01', N'MTR01', N'0010200663314', N'1', N'00001', N'1.01.1.1', N'4')
GO

INSERT INTO [dbo].[ref_rek_skpd] ([KD_CAB], [NM_PEMILIK], [USER_UPDATE], [USER_INPUT], [NO_REK], [STATUS], [KD_KASDA], [KD_SKPD], [KD_DATA]) VALUES (N'022', N'NELLA ROSA SUDIANJAYA', N'MTR01', N'MTR01', N'0010200663314', N'1', N'00001', N'1.01.1.1', N'5')
GO

SET IDENTITY_INSERT [dbo].[ref_rek_skpd] OFF
GO


-- ----------------------------
-- Table structure for ref_rek_sumber
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_rek_sumber]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_rek_sumber]
GO

CREATE TABLE [dbo].[ref_rek_sumber] (
  [NM_SUMBER_DANA] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_SUMBER_DANA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_DATA] int  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[ref_rek_sumber] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_rek_sumber
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_rek_sumber] ON
GO

INSERT INTO [dbo].[ref_rek_sumber] ([NM_SUMBER_DANA], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA]) VALUES (N'RUKD KOTA BIMA', N'CMS01', N'CMS01', N'00011', N'04', N'12')
GO

INSERT INTO [dbo].[ref_rek_sumber] ([NM_SUMBER_DANA], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA]) VALUES (N'bank daerh aceh', N'CMS01', N'CMS01', N'00004', N'01', N'3')
GO

INSERT INTO [dbo].[ref_rek_sumber] ([NM_SUMBER_DANA], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA]) VALUES (N'RKUD', N'', N'', N'00001', N'01', N'5')
GO

INSERT INTO [dbo].[ref_rek_sumber] ([NM_SUMBER_DANA], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA]) VALUES (N'RUKD KASDA LOBAR', N'', N'', N'00002', N'02', N'7')
GO

INSERT INTO [dbo].[ref_rek_sumber] ([NM_SUMBER_DANA], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA]) VALUES (N'RUKS KABUPATEN BIMA', N'', N'', N'00011', N'01', N'8')
GO

INSERT INTO [dbo].[ref_rek_sumber] ([NM_SUMBER_DANA], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA]) VALUES (N'PUSKESMAS KUMBE', N'', N'', N'00011', N'55', N'9')
GO

INSERT INTO [dbo].[ref_rek_sumber] ([NM_SUMBER_DANA], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA]) VALUES (N'PUSKESMAS JATIBARU', N'', N'', N'00011', N'56', N'11')
GO

INSERT INTO [dbo].[ref_rek_sumber] ([NM_SUMBER_DANA], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA]) VALUES (N'REK.PENGELUARAN', N'CMS01', N'CMS01', N'99999', N'01', N'13')
GO

INSERT INTO [dbo].[ref_rek_sumber] ([NM_SUMBER_DANA], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_SUMBER_DANA], [KD_DATA]) VALUES (N'rek test', N'CMS01', N'CMS01', N'99999', N'02', N'14')
GO

SET IDENTITY_INSERT [dbo].[ref_rek_sumber] OFF
GO


-- ----------------------------
-- Table structure for ref_sub_unit
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_sub_unit]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_sub_unit]
GO

CREATE TABLE [dbo].[ref_sub_unit] (
  [NM_SUB_UNIT] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_SUB_UNIT] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_URUSAN] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_DATA_SUB_UNIT] int  IDENTITY(1,1) NOT NULL,
  [KD_BIDANG] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_UNIT] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ref_sub_unit] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_sub_unit
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_sub_unit] ON
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Pendidikan', N'1', N'1', N'000001', N'000001', N'99999', N'1', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Sekretariat Dinas Pendidikan', N'2', N'1', N'000001', N'000001', N'99999', N'2', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Pembinaan Pendidikan Anak Usia Dini dan Pendidikan Non Formal', N'3', N'1', N'000001', N'000001', N'99999', N'3', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Pembinaan Pendidikan Dasar', N'4', N'1', N'000001', N'000001', N'99999', N'4', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Kebudayaan', N'5', N'1', N'000001', N'000001', N'99999', N'5', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Pembinaan Ketenagaan', N'6', N'1', N'000001', N'000001', N'99999', N'6', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 1 Mataram', N'7', N'1', N'000001', N'000001', N'99999', N'7', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 2 Mataram', N'8', N'1', N'000001', N'000001', N'99999', N'8', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 3 Mataram', N'9', N'1', N'000001', N'000001', N'99999', N'9', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 4 Mataram', N'10', N'1', N'000001', N'000001', N'99999', N'10', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 5 Mataram', N'11', N'1', N'000001', N'000001', N'99999', N'11', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 6 Mataram', N'12', N'1', N'000001', N'000001', N'99999', N'12', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 7 Mataram', N'13', N'1', N'000001', N'000001', N'99999', N'13', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 8 Mataram', N'14', N'1', N'000001', N'000001', N'99999', N'14', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 9 Mataram', N'15', N'1', N'000001', N'000001', N'99999', N'15', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 10 Mataram', N'16', N'1', N'000001', N'000001', N'99999', N'16', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 11 Mataram', N'17', N'1', N'000001', N'000001', N'99999', N'17', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 12 Mataram', N'18', N'1', N'000001', N'000001', N'99999', N'18', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 13 Mataram', N'19', N'1', N'000001', N'000001', N'99999', N'19', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 14 Mataram', N'20', N'1', N'000001', N'000001', N'99999', N'20', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 15 Mataram', N'21', N'1', N'000001', N'000001', N'99999', N'21', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 16 Mataram', N'22', N'1', N'000001', N'000001', N'99999', N'22', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 17 Mataram', N'23', N'1', N'000001', N'000001', N'99999', N'23', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 18 Mataram', N'24', N'1', N'000001', N'000001', N'99999', N'24', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 19 Mataram', N'25', N'1', N'000001', N'000001', N'99999', N'25', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 20 Mataram', N'26', N'1', N'000001', N'000001', N'99999', N'26', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 21 Mataram', N'27', N'1', N'000001', N'000001', N'99999', N'27', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 22 Mataram', N'28', N'1', N'000001', N'000001', N'99999', N'28', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 23 Mataram', N'29', N'1', N'000001', N'000001', N'99999', N'29', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 24 Mataram', N'30', N'1', N'000001', N'000001', N'99999', N'30', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 25 Mataram', N'31', N'1', N'000001', N'000001', N'99999', N'31', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 26 Mataram', N'32', N'1', N'000001', N'000001', N'99999', N'32', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SMP  Negeri 27 Mataram', N'33', N'1', N'000001', N'000001', N'99999', N'33', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Sekolah Luar Biasa Negeri Ampenan', N'34', N'1', N'000001', N'000001', N'99999', N'34', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Pengelola Administrasi SD/Tk Kec. Cakranegara dan Sandubaya', N'35', N'1', N'000001', N'000001', N'99999', N'35', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Pengelola Administrasi SD/Tk Kec. Mataram dan Selaparang', N'36', N'1', N'000001', N'000001', N'99999', N'36', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Pengelola Administrasi SD/Tk Kec. Ampenan dan Sekarbela', N'37', N'1', N'000001', N'000001', N'99999', N'37', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Pengelola Administrasi SD/Tk Kec. Selaparang', N'38', N'1', N'000001', N'000001', N'99999', N'38', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Pengelola Administrasi SD/Tk Kec. Sandubaya', N'39', N'1', N'000001', N'000001', N'99999', N'39', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Pengelola Administrasi SD/Tk Kec. Sekarbela', N'40', N'1', N'000001', N'000001', N'99999', N'40', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Satuan Pendidikan Nonformal Sangar Kegiatan Belajar (SKB)', N'41', N'1', N'000001', N'000001', N'99999', N'41', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 1 Ampenan', N'42', N'1', N'000001', N'000001', N'99999', N'42', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 2 Ampenan', N'43', N'1', N'000001', N'000001', N'99999', N'43', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 3 Ampenan', N'44', N'1', N'000001', N'000001', N'99999', N'44', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 4 Ampenan', N'45', N'1', N'000001', N'000001', N'99999', N'45', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 5 Ampenan', N'46', N'1', N'000001', N'000001', N'99999', N'46', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 6 Ampenan', N'47', N'1', N'000001', N'000001', N'99999', N'47', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 7 Ampenan', N'48', N'1', N'000001', N'000001', N'99999', N'48', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 9 Ampenan', N'49', N'1', N'000001', N'000001', N'99999', N'49', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 10 Ampenan', N'50', N'1', N'000001', N'000001', N'99999', N'50', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 11 Ampenan', N'51', N'1', N'000001', N'000001', N'99999', N'51', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 12 Ampenan', N'52', N'1', N'000001', N'000001', N'99999', N'52', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 13 Ampenan', N'53', N'1', N'000001', N'000001', N'99999', N'53', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 14 Ampenan', N'54', N'1', N'000001', N'000001', N'99999', N'54', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 15 Ampenan', N'55', N'1', N'000001', N'000001', N'99999', N'55', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 16 Ampenan', N'56', N'1', N'000001', N'000001', N'99999', N'56', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 17 Ampenan', N'57', N'1', N'000001', N'000001', N'99999', N'57', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 18 Ampenan', N'58', N'1', N'000001', N'000001', N'99999', N'58', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 19 Ampenan', N'59', N'1', N'000001', N'000001', N'99999', N'59', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 20 Ampenan', N'60', N'1', N'000001', N'000001', N'99999', N'60', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 21 Ampenan', N'61', N'1', N'000001', N'000001', N'99999', N'61', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 22 Ampenan', N'62', N'1', N'000001', N'000001', N'99999', N'62', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 23 Ampenan', N'63', N'1', N'000001', N'000001', N'99999', N'63', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 24 Ampenan', N'64', N'1', N'000001', N'000001', N'99999', N'64', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 25 Ampenan', N'65', N'1', N'000001', N'000001', N'99999', N'65', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 26 Ampenan', N'66', N'1', N'000001', N'000001', N'99999', N'66', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 27 Ampenan', N'67', N'1', N'000001', N'000001', N'99999', N'67', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 28 Ampenan', N'68', N'1', N'000001', N'000001', N'99999', N'68', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 29 Ampenan', N'69', N'1', N'000001', N'000001', N'99999', N'69', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 30 Ampenan', N'70', N'1', N'000001', N'000001', N'99999', N'70', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 31 Ampenan', N'71', N'1', N'000001', N'000001', N'99999', N'71', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 32 Ampenan', N'72', N'1', N'000001', N'000001', N'99999', N'72', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 33 Ampenan', N'73', N'1', N'000001', N'000001', N'99999', N'73', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 34 Ampenan', N'74', N'1', N'000001', N'000001', N'99999', N'74', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 35 Ampenan', N'75', N'1', N'000001', N'000001', N'99999', N'75', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 36 Ampenan', N'76', N'1', N'000001', N'000001', N'99999', N'76', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 37 Ampenan', N'77', N'1', N'000001', N'000001', N'99999', N'77', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 38 Ampenan', N'78', N'1', N'000001', N'000001', N'99999', N'78', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 39 Ampenan', N'79', N'1', N'000001', N'000001', N'99999', N'79', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 40 Ampenan', N'80', N'1', N'000001', N'000001', N'99999', N'80', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 41 Ampenan', N'81', N'1', N'000001', N'000001', N'99999', N'81', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 42 Ampenan', N'82', N'1', N'000001', N'000001', N'99999', N'82', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 43 Ampenan', N'83', N'1', N'000001', N'000001', N'99999', N'83', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 44 Ampenan', N'84', N'1', N'000001', N'000001', N'99999', N'84', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 45 Ampenan', N'85', N'1', N'000001', N'000001', N'99999', N'85', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 46 Ampenan', N'86', N'1', N'000001', N'000001', N'99999', N'86', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 47 Ampenan', N'87', N'1', N'000001', N'000001', N'99999', N'87', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 48 Ampenan', N'88', N'1', N'000001', N'000001', N'99999', N'88', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 2 Kuranji', N'89', N'1', N'000001', N'000001', N'99999', N'89', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 4 Kuranji', N'90', N'1', N'000001', N'000001', N'99999', N'90', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 1 Mataram', N'91', N'1', N'000001', N'000001', N'99999', N'91', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 2 Mataram', N'92', N'1', N'000001', N'000001', N'99999', N'92', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 3 Mataram', N'93', N'1', N'000001', N'000001', N'99999', N'93', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 4 Mataram', N'94', N'1', N'000001', N'000001', N'99999', N'94', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 5 Mataram', N'95', N'1', N'000001', N'000001', N'99999', N'95', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 6 Mataram', N'96', N'1', N'000001', N'000001', N'99999', N'96', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 7 Mataram', N'97', N'1', N'000001', N'000001', N'99999', N'97', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 8 Mataram', N'98', N'1', N'000001', N'000001', N'99999', N'98', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 9 Mataram', N'99', N'1', N'000001', N'000001', N'99999', N'99', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 10 Mataram', N'100', N'1', N'000001', N'000001', N'99999', N'100', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 11 Mataram', N'101', N'1', N'000001', N'000001', N'99999', N'101', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 12 Mataram', N'102', N'1', N'000001', N'000001', N'99999', N'102', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 13 Mataram', N'103', N'1', N'000001', N'000001', N'99999', N'103', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 14 Mataram', N'104', N'1', N'000001', N'000001', N'99999', N'104', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 15 Mataram', N'105', N'1', N'000001', N'000001', N'99999', N'105', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 16 Mataram', N'106', N'1', N'000001', N'000001', N'99999', N'106', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 17 Mataram', N'107', N'1', N'000001', N'000001', N'99999', N'107', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 18 Mataram', N'108', N'1', N'000001', N'000001', N'99999', N'108', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 19 Mataram', N'109', N'1', N'000001', N'000001', N'99999', N'109', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 20 Mataram', N'110', N'1', N'000001', N'000001', N'99999', N'110', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 22 Mataram', N'111', N'1', N'000001', N'000001', N'99999', N'111', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 23 Mataram', N'112', N'1', N'000001', N'000001', N'99999', N'112', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 24 Mataram', N'113', N'1', N'000001', N'000001', N'99999', N'113', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 25 Mataram', N'114', N'1', N'000001', N'000001', N'99999', N'114', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 26 Mataram', N'115', N'1', N'000001', N'000001', N'99999', N'115', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 27 Mataram', N'116', N'1', N'000001', N'000001', N'99999', N'116', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 28 Mataram', N'117', N'1', N'000001', N'000001', N'99999', N'117', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 29 Mataram', N'118', N'1', N'000001', N'000001', N'99999', N'118', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 30 Mataram', N'119', N'1', N'000001', N'000001', N'99999', N'119', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 31 Mataram', N'120', N'1', N'000001', N'000001', N'99999', N'120', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 32 Mataram', N'121', N'1', N'000001', N'000001', N'99999', N'121', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 33 Mataram', N'122', N'1', N'000001', N'000001', N'99999', N'122', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 34 Mataram', N'123', N'1', N'000001', N'000001', N'99999', N'123', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 35 Mataram', N'124', N'1', N'000001', N'000001', N'99999', N'124', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 36 Mataram', N'125', N'1', N'000001', N'000001', N'99999', N'125', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 37 Mataram', N'126', N'1', N'000001', N'000001', N'99999', N'126', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 38 Mataram', N'127', N'1', N'000001', N'000001', N'99999', N'127', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 39 Mataram', N'128', N'1', N'000001', N'000001', N'99999', N'128', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 40 Mataram', N'129', N'1', N'000001', N'000001', N'99999', N'129', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 41 Mataram', N'130', N'1', N'000001', N'000001', N'99999', N'130', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 42 Mataram', N'131', N'1', N'000001', N'000001', N'99999', N'131', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 43 Mataram', N'132', N'1', N'000001', N'000001', N'99999', N'132', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 44 Mataram', N'133', N'1', N'000001', N'000001', N'99999', N'133', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 45 Mataram', N'134', N'1', N'000001', N'000001', N'99999', N'134', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 46 Mataram', N'135', N'1', N'000001', N'000001', N'99999', N'135', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 47 Mataram', N'136', N'1', N'000001', N'000001', N'99999', N'136', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 4 Bajur', N'137', N'1', N'000001', N'000001', N'99999', N'137', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 1 Cakranegara', N'138', N'1', N'000001', N'000001', N'99999', N'138', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 2 Cakranegara', N'139', N'1', N'000001', N'000001', N'99999', N'139', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 3 Cakranegara', N'140', N'1', N'000001', N'000001', N'99999', N'140', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 4 Cakranegara', N'141', N'1', N'000001', N'000001', N'99999', N'141', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 5 Cakranegara', N'142', N'1', N'000001', N'000001', N'99999', N'142', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 6 Cakranegara', N'143', N'1', N'000001', N'000001', N'99999', N'143', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 7 Cakranegara', N'144', N'1', N'000001', N'000001', N'99999', N'144', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 8 Cakranegara', N'145', N'1', N'000001', N'000001', N'99999', N'145', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 9 Cakranegara', N'146', N'1', N'000001', N'000001', N'99999', N'146', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 10 Cakranegara', N'147', N'1', N'000001', N'000001', N'99999', N'147', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 11 Cakranegara', N'148', N'1', N'000001', N'000001', N'99999', N'148', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 12 Cakranegara', N'149', N'1', N'000001', N'000001', N'99999', N'149', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 14 Cakranegara', N'150', N'1', N'000001', N'000001', N'99999', N'150', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 15 Cakranegara', N'151', N'1', N'000001', N'000001', N'99999', N'151', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 16 Cakranegara', N'152', N'1', N'000001', N'000001', N'99999', N'152', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 18 Cakranegara', N'153', N'1', N'000001', N'000001', N'99999', N'153', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 19 Cakranegara', N'154', N'1', N'000001', N'000001', N'99999', N'154', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 20 Cakranegara', N'155', N'1', N'000001', N'000001', N'99999', N'155', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 21  Cakranegara', N'156', N'1', N'000001', N'000001', N'99999', N'156', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 22 Cakranegara', N'157', N'1', N'000001', N'000001', N'99999', N'157', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 23 Cakranegara', N'158', N'1', N'000001', N'000001', N'99999', N'158', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 24 Cakranegara', N'159', N'1', N'000001', N'000001', N'99999', N'159', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 25 Cakranegara', N'160', N'1', N'000001', N'000001', N'99999', N'160', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 26 Cakranegara', N'161', N'1', N'000001', N'000001', N'99999', N'161', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 27 Cakranegara', N'162', N'1', N'000001', N'000001', N'99999', N'162', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 28 Cakranegara', N'163', N'1', N'000001', N'000001', N'99999', N'163', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 29 Cakranegara', N'164', N'1', N'000001', N'000001', N'99999', N'164', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 30 Cakranegara', N'165', N'1', N'000001', N'000001', N'99999', N'165', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 31 Cakranegara', N'166', N'1', N'000001', N'000001', N'99999', N'166', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 32 Cakranegara', N'167', N'1', N'000001', N'000001', N'99999', N'167', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 33 Cakranegara', N'168', N'1', N'000001', N'000001', N'99999', N'168', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 34 Cakranegara', N'169', N'1', N'000001', N'000001', N'99999', N'169', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 35 Cakranegara', N'170', N'1', N'000001', N'000001', N'99999', N'170', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 36 Cakranegara', N'171', N'1', N'000001', N'000001', N'99999', N'171', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 37 Cakranegara', N'172', N'1', N'000001', N'000001', N'99999', N'172', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 38 Cakranegara', N'173', N'1', N'000001', N'000001', N'99999', N'173', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 39 Cakranegara', N'174', N'1', N'000001', N'000001', N'99999', N'174', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 40 Cakranegara', N'175', N'1', N'000001', N'000001', N'99999', N'175', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 41 Cakranegara', N'176', N'1', N'000001', N'000001', N'99999', N'176', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 42 Cakranegara', N'177', N'1', N'000001', N'000001', N'99999', N'177', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 43 Cakranegara', N'178', N'1', N'000001', N'000001', N'99999', N'178', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 44 Cakranegara', N'179', N'1', N'000001', N'000001', N'99999', N'179', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 46 Cakranegara', N'180', N'1', N'000001', N'000001', N'99999', N'180', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 47 Cakranegara', N'181', N'1', N'000001', N'000001', N'99999', N'181', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 48 Cakranegara', N'182', N'1', N'000001', N'000001', N'99999', N'182', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 49 Cakranegara', N'183', N'1', N'000001', N'000001', N'99999', N'183', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 50 Cakranegara', N'184', N'1', N'000001', N'000001', N'99999', N'184', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 51 Cakranegara', N'185', N'1', N'000001', N'000001', N'99999', N'185', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SDN 52 Cakranegara', N'186', N'1', N'000001', N'000001', N'99999', N'186', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'SD Negeri Model Mataram', N'187', N'1', N'000001', N'000001', N'99999', N'187', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Kesehatan', N'1', N'1', N'000001', N'000001', N'99999', N'188', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Sekretariat Dinas Kesehatan', N'2', N'1', N'000001', N'000001', N'99999', N'189', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Kesehatan Masyarakat', N'3', N'1', N'000001', N'000001', N'99999', N'190', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Pencegahan dan Pengendalian Penyakit', N'4', N'1', N'000001', N'000001', N'99999', N'191', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Pelayanan Kesehatan dan Sumber Daya Kesehatan', N'5', N'1', N'000001', N'000001', N'99999', N'192', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Instalasi Farmasi Kesehatan', N'6', N'1', N'000001', N'000001', N'99999', N'193', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Ampenan', N'7', N'1', N'000001', N'000001', N'99999', N'194', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Tanjung Karang', N'8', N'1', N'000001', N'000001', N'99999', N'195', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Karang Pule', N'9', N'1', N'000001', N'000001', N'99999', N'196', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Mataram', N'10', N'1', N'000001', N'000001', N'99999', N'197', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Pagesangan', N'11', N'1', N'000001', N'000001', N'99999', N'198', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Cakranegara', N'12', N'1', N'000001', N'000001', N'99999', N'199', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Karang Taliwang', N'13', N'1', N'000001', N'000001', N'99999', N'200', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Dasan Cermen', N'14', N'1', N'000001', N'000001', N'99999', N'201', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Selaparang', N'15', N'1', N'000001', N'000001', N'99999', N'202', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Dasan Agung', N'16', N'1', N'000001', N'000001', N'99999', N'203', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Pejeruk', N'17', N'1', N'000001', N'000001', N'99999', N'204', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Puskesmas Babakan', N'18', N'1', N'000001', N'000001', N'99999', N'205', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Laboratorium Kesehatan', N'19', N'1', N'000001', N'000001', N'99999', N'206', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'RSUD Kota Mataram', N'1', N'1', N'000001', N'000001', N'99999', N'207', N'02', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Pekerjaan Umum dan Penataan Ruang', N'1', N'1', N'000001', N'000001', N'99999', N'208', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Sekretariat Dinas PUPR', N'2', N'1', N'000001', N'000001', N'99999', N'209', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Tata Ruang', N'3', N'1', N'000001', N'000001', N'99999', N'210', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Sumber Daya Air', N'4', N'1', N'000001', N'000001', N'99999', N'211', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Cipta Karya', N'5', N'1', N'000001', N'000001', N'99999', N'212', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Bina Marga', N'6', N'1', N'000001', N'000001', N'99999', N'213', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Penerangan Jalan Umum', N'7', N'1', N'000001', N'000001', N'99999', N'214', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Rusunawa', N'8', N'1', N'000001', N'000001', N'99999', N'215', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Perumahan dan Kawasan Permukiman', N'1', N'1', N'000001', N'000001', N'99999', N'216', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Penerangan Jalan Umum', N'2', N'1', N'000001', N'000001', N'99999', N'217', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Rusunawa', N'3', N'1', N'000001', N'000001', N'99999', N'218', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Satuan Polisi Pamong Praja', N'1', N'1', N'000001', N'000001', N'99999', N'219', N'05', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Pemadam Kebakaran', N'1', N'1', N'000001', N'000001', N'99999', N'220', N'05', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Badan Kesatuan Bangsa dan Politik', N'1', N'1', N'000001', N'000001', N'99999', N'221', N'05', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Badan Penanggulangan Bencana Daerah', N'1', N'1', N'000001', N'000001', N'99999', N'222', N'05', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Sosial', N'1', N'1', N'000001', N'000001', N'99999', N'223', N'06', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Tenaga Kerja', N'1', N'2', N'000001', N'000001', N'99999', N'224', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Pemberdayaan Perempuan dan Perlindungan Anak', N'1', N'2', N'000001', N'000001', N'99999', N'225', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Ketahanan Pangan', N'1', N'2', N'000001', N'000001', N'99999', N'226', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Lingkungan Hidup', N'1', N'2', N'000001', N'000001', N'99999', N'227', N'05', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Sekretariat Dinas Lingkungan Hidup', N'2', N'2', N'000001', N'000001', N'99999', N'228', N'05', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Tata Lingkungan', N'3', N'2', N'000001', N'000001', N'99999', N'229', N'05', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Pengelolaan Sampah, Limbah dan Limbah B3', N'4', N'2', N'000001', N'000001', N'99999', N'230', N'05', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Pengawasan, Pengendalian dan Pencemaran Lingkungan Hidup', N'5', N'2', N'000001', N'000001', N'99999', N'231', N'05', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Penataan dan Peningkatan Kapasitas SDM Lingkungan Hidup', N'6', N'2', N'000001', N'000001', N'99999', N'232', N'05', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Laboratorium Lingkungan', N'7', N'2', N'000001', N'000001', N'99999', N'233', N'05', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Bank Sampah', N'8', N'2', N'000001', N'000001', N'99999', N'234', N'05', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Kependudukan dan Pencatatan Sipil', N'1', N'2', N'000001', N'000001', N'99999', N'235', N'06', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kecamatan Cakranegara', N'1', N'2', N'000001', N'000001', N'99999', N'236', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Cakranegara Barat', N'2', N'2', N'000001', N'000001', N'99999', N'237', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Cilinaya', N'3', N'2', N'000001', N'000001', N'99999', N'238', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Sapta Marga', N'4', N'2', N'000001', N'000001', N'99999', N'239', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Mayura', N'5', N'2', N'000001', N'000001', N'99999', N'240', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Cakranegara Timur', N'6', N'2', N'000001', N'000001', N'99999', N'241', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Cakranegara Selatan', N'7', N'2', N'000001', N'000001', N'99999', N'242', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Cakranegara Selatan Baru', N'8', N'2', N'000001', N'000001', N'99999', N'243', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Cakranegara Utara', N'9', N'2', N'000001', N'000001', N'99999', N'244', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Karang Taliwang', N'10', N'2', N'000001', N'000001', N'99999', N'245', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Sayang-Sayang', N'11', N'2', N'000001', N'000001', N'99999', N'246', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kecamatan Sandubaya', N'1', N'2', N'000001', N'000001', N'99999', N'247', N'07', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Selagalas', N'2', N'2', N'000001', N'000001', N'99999', N'248', N'07', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Bertais', N'3', N'2', N'000001', N'000001', N'99999', N'249', N'07', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Mandalika', N'4', N'2', N'000001', N'000001', N'99999', N'250', N'07', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Babakan', N'5', N'2', N'000001', N'000001', N'99999', N'251', N'07', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Turida', N'6', N'2', N'000001', N'000001', N'99999', N'252', N'07', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Abian Tubuh Baru', N'7', N'2', N'000001', N'000001', N'99999', N'253', N'07', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Dasan Cermen', N'8', N'2', N'000001', N'000001', N'99999', N'254', N'07', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kecamatan Mataram', N'1', N'2', N'000001', N'000001', N'99999', N'255', N'07', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Punia', N'2', N'2', N'000001', N'000001', N'99999', N'256', N'07', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Pejanggik', N'3', N'2', N'000001', N'000001', N'99999', N'257', N'07', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Mataram Timur', N'4', N'2', N'000001', N'000001', N'99999', N'258', N'07', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Pagesangan Barat', N'5', N'2', N'000001', N'000001', N'99999', N'259', N'07', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Pagesangan', N'6', N'2', N'000001', N'000001', N'99999', N'260', N'07', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Pagesangan Timur', N'7', N'2', N'000001', N'000001', N'99999', N'261', N'07', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Pagutan Barat', N'8', N'2', N'000001', N'000001', N'99999', N'262', N'07', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Pagutan', N'9', N'2', N'000001', N'000001', N'99999', N'263', N'07', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Pagutan Timur', N'10', N'2', N'000001', N'000001', N'99999', N'264', N'07', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kecamatan Selaparang', N'1', N'2', N'000001', N'000001', N'99999', N'265', N'07', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Rembiga', N'2', N'2', N'000001', N'000001', N'99999', N'266', N'07', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Karang Baru', N'3', N'2', N'000001', N'000001', N'99999', N'267', N'07', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Monjok Barat', N'4', N'2', N'000001', N'000001', N'99999', N'268', N'07', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Monjok', N'5', N'2', N'000001', N'000001', N'99999', N'269', N'07', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Monjok Timur', N'6', N'2', N'000001', N'000001', N'99999', N'270', N'07', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Mataram Barat', N'7', N'2', N'000001', N'000001', N'99999', N'271', N'07', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Gomong', N'8', N'2', N'000001', N'000001', N'99999', N'272', N'07', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Dasan Agung', N'9', N'2', N'000001', N'000001', N'99999', N'273', N'07', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Dasan Agung Baru', N'10', N'2', N'000001', N'000001', N'99999', N'274', N'07', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kecamatan Ampenan', N'1', N'2', N'000001', N'000001', N'99999', N'275', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Bintaro', N'2', N'2', N'000001', N'000001', N'99999', N'276', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Ampenan  Utara', N'3', N'2', N'000001', N'000001', N'99999', N'277', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Dayan Peken', N'4', N'2', N'000001', N'000001', N'99999', N'278', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Ampenan Tengah', N'5', N'2', N'000001', N'000001', N'99999', N'279', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Banjar', N'6', N'2', N'000001', N'000001', N'99999', N'280', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Ampenan Selatan', N'7', N'2', N'000001', N'000001', N'99999', N'281', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Taman Sari', N'8', N'2', N'000001', N'000001', N'99999', N'282', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Pejeruk', N'9', N'2', N'000001', N'000001', N'99999', N'283', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Kebun Sari', N'10', N'2', N'000001', N'000001', N'99999', N'284', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Pejarakan Karya', N'11', N'2', N'000001', N'000001', N'99999', N'285', N'07', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kecamatan Sekarbela', N'1', N'2', N'000001', N'000001', N'99999', N'286', N'07', N'6')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Kekalik Jaya', N'2', N'2', N'000001', N'000001', N'99999', N'287', N'07', N'6')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Tanjung Karang Permai', N'3', N'2', N'000001', N'000001', N'99999', N'288', N'07', N'6')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Tanjung Karang', N'4', N'2', N'000001', N'000001', N'99999', N'289', N'07', N'6')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Karang Pule', N'5', N'2', N'000001', N'000001', N'99999', N'290', N'07', N'6')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kelurahan Jempong Baru', N'6', N'2', N'000001', N'000001', N'99999', N'291', N'07', N'6')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Pengendalian Penduduk dan Keluarga Berencana', N'1', N'2', N'000001', N'000001', N'99999', N'292', N'08', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Perhubungan', N'1', N'2', N'000001', N'000001', N'99999', N'293', N'09', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Terminal Mandalika', N'2', N'2', N'000001', N'000001', N'99999', N'294', N'09', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Pengujian Kendaraan Bermotor', N'3', N'2', N'000001', N'000001', N'99999', N'295', N'09', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'UPTD Perparkiran', N'4', N'2', N'000001', N'000001', N'99999', N'296', N'09', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Komunikasi dan Informatika', N'1', N'2', N'000001', N'000001', N'99999', N'297', N'10', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Perindustrian, Koperasi, Usaha Kecil dan Menengah', N'1', N'2', N'000001', N'000001', N'99999', N'298', N'11', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', N'1', N'2', N'000001', N'000001', N'99999', N'299', N'12', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Kepemudaan dan Olahraga', N'1', N'2', N'000001', N'000001', N'99999', N'300', N'13', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Kearsipan dan Perpustakaan', N'1', N'2', N'000001', N'000001', N'99999', N'301', N'18', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Kelautan dan Perikanan', N'1', N'3', N'000001', N'000001', N'99999', N'302', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Pariwisata', N'1', N'3', N'000001', N'000001', N'99999', N'303', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Pertanian', N'1', N'3', N'000001', N'000001', N'99999', N'304', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Dinas Perdagangan', N'1', N'3', N'000001', N'000001', N'99999', N'305', N'06', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'DPRD', N'1', N'4', N'000001', N'000001', N'99999', N'306', N'01', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Kepala Daerah dan Wakil Kepala Daerah', N'1', N'4', N'000001', N'000001', N'99999', N'307', N'01', N'2')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Sekretariat Daerah', N'1', N'4', N'000001', N'000001', N'99999', N'308', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bagian Tata Pemerintahan', N'2', N'4', N'000001', N'000001', N'99999', N'309', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bagian Bina Kesejahteraan Rakyat', N'3', N'4', N'000001', N'000001', N'99999', N'310', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bagian Hukum', N'4', N'4', N'000001', N'000001', N'99999', N'311', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bagian Perekonomian', N'5', N'4', N'000001', N'000001', N'99999', N'312', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bagian Infrastruktur', N'6', N'4', N'000001', N'000001', N'99999', N'313', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bagian Administrasi Pembangunan dan Kerjasama', N'7', N'4', N'000001', N'000001', N'99999', N'314', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bagian Organisasi', N'8', N'4', N'000001', N'000001', N'99999', N'315', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bagian Umum', N'9', N'4', N'000001', N'000001', N'99999', N'316', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bagian Humas dan Protokol', N'10', N'4', N'000001', N'000001', N'99999', N'317', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bagian Layanan Pengadaan', N'11', N'4', N'000001', N'000001', N'99999', N'318', N'01', N'3')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Sekretariat DPRD', N'1', N'4', N'000001', N'000001', N'99999', N'319', N'01', N'4')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Sekretariat KORPRI', N'1', N'4', N'000001', N'000001', N'99999', N'320', N'01', N'5')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Inspektorat Daerah', N'1', N'4', N'000001', N'000001', N'99999', N'321', N'02', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Badan Perencanaan Pembangunan Daerah', N'1', N'4', N'000001', N'000001', N'99999', N'322', N'03', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Badan Keuangan Daerah', N'1', N'4', N'000001', N'000001', N'99999', N'323', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Sekretariat BKD', N'2', N'4', N'000001', N'000001', N'99999', N'324', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Pendataan, Perhitungan Penetapan dan Pengolahan Data', N'3', N'4', N'000001', N'000001', N'99999', N'325', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Pelayanan, Penyuluhan dan Penagihan', N'4', N'4', N'000001', N'000001', N'99999', N'326', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Pengendalian Pendapatan Daerah', N'5', N'4', N'000001', N'000001', N'99999', N'327', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Akuntansi dan Pelaporan', N'6', N'4', N'000001', N'000001', N'99999', N'328', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Anggaran dan Perbendaharaan', N'7', N'4', N'000001', N'000001', N'99999', N'329', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Bidang Asset', N'8', N'4', N'000001', N'000001', N'99999', N'330', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'BKD selaku SKPKD', N'9', N'4', N'000001', N'000001', N'99999', N'331', N'04', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Daerah', N'1', N'4', N'000001', N'000001', N'99999', N'332', N'05', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'Badan Penelitian dan Pengembangan', N'1', N'4', N'000001', N'000001', N'99999', N'333', N'07', N'1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KECAMATAN ASAKOTA', N'1', N'4', N'000001', N'000001', N'00001', N'334', N'01', N' 7')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN KOLO', N'2', N'4', N'000001', N'000001', N'00001', N'335', N'01', N' 7')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN MELAYU', N'3', N'4', N'000001', N'000001', N'00001', N'336', N'01', N' 7')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN JATIWANGI', N'4', N'4', N'000001', N'000001', N'00001', N'337', N'01', N' 7')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN JATIBARU', N'5', N'4', N'000001', N'000001', N'00001', N'338', N'01', N' 7')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KECAMATAN MPUNDA', N'1', N'4', N'000001', N'000001', N'00001', N'339', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN LEWIRATO', N'2', N'4', N'000001', N'000001', N'00001', N'340', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN PENATOI', N'3', N'4', N'000001', N'000001', N'00001', N'341', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN SADIA', N'4', N'4', N'000001', N'000001', N'00001', N'342', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN MANDE', N'5', N'4', N'000001', N'000001', N'00001', N'343', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN PANGGI', N'6', N'4', N'000001', N'000001', N'00001', N'344', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN SAMBINAE', N'7', N'4', N'000001', N'000001', N'00001', N'345', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN MANGGEMACI', N'8', N'4', N'000001', N'000001', N'00001', N'346', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN MONGGONAO', N'9', N'4', N'000001', N'000001', N'00001', N'347', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN SANTI', N'10', N'4', N'000001', N'000001', N'00001', N'348', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN MATAKANDO', N'11', N'4', N'000001', N'000001', N'00001', N'349', N'01', N' 8')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KECAMATAN RABA', N'1', N'4', N'000001', N'000001', N'00001', N'350', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN PENARAGA', N'2', N'4', N'000001', N'000001', N'00001', N'351', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN KENDO', N'3', N'4', N'000001', N'000001', N'00001', N'352', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN PENANAE', N'4', N'4', N'000001', N'000001', N'00001', N'353', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN RABADOMPU TIMUR', N'5', N'4', N'000001', N'000001', N'00001', N'354', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN RABADOMPU BARAT', N'6', N'4', N'000001', N'000001', N'00001', N'355', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN NTOBO', N'7', N'4', N'000001', N'000001', N'00001', N'356', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN RABANGODU UTARA', N'8', N'4', N'000001', N'000001', N'00001', N'357', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN RABANGODU SELATAN', N'9', N'4', N'000001', N'000001', N'00001', N'358', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN RITE', N'10', N'4', N'000001', N'000001', N'00001', N'359', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN RONTU', N'11', N'4', N'000001', N'000001', N'00001', N'360', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'KELURAHAN NITU', N'12', N'4', N'000001', N'000001', N'00001', N'361', N'01', N' 9')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'INSPEKTORAT', N'1', N'4', N'000001', N'000001', N'00001', N'362', N'02', N' 1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'BADAN PERENCANAAN PEMBANGUNAN DAERAH, PENELITIAN DAN PENGEMBANGAN', N'1', N'4', N'000001', N'000001', N'00001', N'363', N'03', N' 1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH (SKPD)', N'1', N'4', N'000001', N'000001', N'00001', N'364', N'04', N' 1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH (SKPKD)', N'2', N'4', N'000001', N'000001', N'00001', N'365', N'04', N' 1')
GO

INSERT INTO [dbo].[ref_sub_unit] ([NM_SUB_UNIT], [KD_SUB_UNIT], [KD_URUSAN], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_SUB_UNIT], [KD_BIDANG], [KD_UNIT]) VALUES (N'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA', N'1', N'4', N'000001', N'000001', N'00001', N'366', N'05', N' 1')
GO

SET IDENTITY_INSERT [dbo].[ref_sub_unit] OFF
GO


-- ----------------------------
-- Table structure for ref_terminal
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_terminal]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_terminal]
GO

CREATE TABLE [dbo].[ref_terminal] (
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_TERMINAL] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NAMA_TERMINAL] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MAC_ADDRESS] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IP_ADDRESS] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STATUS] int  NULL
)
GO

ALTER TABLE [dbo].[ref_terminal] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_terminal
-- ----------------------------
INSERT INTO [dbo].[ref_terminal] VALUES (N'00001', N'112', N'409349', N'02390', N'4820', N'1')
GO

INSERT INTO [dbo].[ref_terminal] VALUES (N'00001', N'mac', N'409349', N'02390', N'4820', N'1')
GO

INSERT INTO [dbo].[ref_terminal] VALUES (N'00001', N'macaa', N'409349', N'02390', N'4820', N'1')
GO

INSERT INTO [dbo].[ref_terminal] VALUES (N'00002', N'ooopo', N'pop', N'opo', N'poppop', N'1')
GO


-- ----------------------------
-- Table structure for ref_unit
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_unit]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_unit]
GO

CREATE TABLE [dbo].[ref_unit] (
  [NM_UNIT] nvarchar(300) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_BIDANG] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_UNIT] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_KASDA] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KD_DATA_UNIT] int  IDENTITY(1,1) NOT NULL,
  [KD_URUSAN] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ref_unit] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_unit
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ref_unit] ON
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PENDIDIKAN', N'01', N'1', N'000001', N'000001', N'99999', N'1', N'1')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS KESEHATAN', N'02', N'1', N'000001', N'000001', N'99999', N'2', N'1')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'RSUD KOTA MATARAM', N'02', N'2', N'000001', N'000001', N'99999', N'3', N'1')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', N'03', N'1', N'000001', N'000001', N'99999', N'4', N'1')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN', N'04', N'1', N'000001', N'000001', N'99999', N'5', N'1')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'SATUAN POLISI PAMONG PRAJA', N'05', N'1', N'000001', N'000001', N'99999', N'6', N'1')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PEMADAM KEBAKARAN', N'05', N'2', N'000001', N'000001', N'99999', N'7', N'1')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'BADAN KESATUAN BANGSA DAN POLITIK', N'05', N'3', N'000001', N'000001', N'99999', N'8', N'1')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'BADAN PENANGGULANGAN BENCANA DAERAH', N'05', N'4', N'000001', N'000001', N'99999', N'9', N'1')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS SOSIAL', N'06', N'1', N'000001', N'000001', N'99999', N'10', N'1')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS TENAGA KERJA', N'01', N'1', N'000001', N'000001', N'99999', N'11', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK', N'02', N'1', N'000001', N'000001', N'99999', N'12', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS KETAHANAN PANGAN', N'03', N'1', N'000001', N'000001', N'99999', N'13', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS LINGKUNGAN HIDUP', N'05', N'1', N'000001', N'000001', N'99999', N'14', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', N'06', N'1', N'000001', N'000001', N'99999', N'15', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'KECAMATAN CAKRANEGARA', N'07', N'1', N'000001', N'000001', N'99999', N'16', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'KECAMATAN SANDUBAYA', N'07', N'2', N'000001', N'000001', N'99999', N'17', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'KECAMATAN MATARAM', N'07', N'3', N'000001', N'000001', N'99999', N'18', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'KECAMATAN SELAPARANG', N'07', N'4', N'000001', N'000001', N'99999', N'19', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'KECAMATAN AMPENAN', N'07', N'5', N'000001', N'000001', N'99999', N'20', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'KECAMATAN SEKARBELA', N'07', N'6', N'000001', N'000001', N'99999', N'21', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA', N'08', N'1', N'000001', N'000001', N'99999', N'22', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PERHUBUNGAN', N'09', N'1', N'000001', N'000001', N'99999', N'23', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS KOMUNIKASI DAN INFORMATIKA', N'10', N'1', N'000001', N'000001', N'99999', N'24', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PERINDUSTRIAN, KOPERASI, USAHA KECIL DAN MENENGAH', N'11', N'1', N'000001', N'000001', N'99999', N'25', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU', N'12', N'1', N'000001', N'000001', N'99999', N'26', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS KEPEMUDAAN DAN OLAHRAGA', N'13', N'1', N'000001', N'000001', N'99999', N'27', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS KEARSIPAN DAN PERPUSTAKAAN', N'18', N'1', N'000001', N'000001', N'99999', N'28', N'2')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS KELAUTAN DAN PERIKANAN', N'01', N'1', N'000001', N'000001', N'99999', N'29', N'3')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PARIWISATA', N'02', N'1', N'000001', N'000001', N'99999', N'30', N'3')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PERTANIAN', N'03', N'1', N'000001', N'000001', N'99999', N'31', N'3')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'DINAS PERDAGANGAN', N'06', N'1', N'000001', N'000001', N'99999', N'32', N'3')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'KEPALA DAERAH DAN WAKIL KEPALA DAERAH', N'01', N'2', N'000001', N'000001', N'99999', N'33', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'SEKRETARIAT DAERAH', N'01', N'3', N'000001', N'000001', N'99999', N'34', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'SEKRETARIAT DPRD', N'01', N'4', N'000001', N'000001', N'99999', N'35', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'SEKRETARIAT KORPRI', N'01', N'5', N'000001', N'000001', N'99999', N'36', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'INSPEKTORAT DAERAH', N'02', N'1', N'000001', N'000001', N'99999', N'37', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'BADAN PERENCANAAN PEMBANGUNAN DAERAH', N'03', N'1', N'000001', N'000001', N'99999', N'38', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'BADAN KEUANGAN DAERAH', N'04', N'1', N'000001', N'000001', N'99999', N'39', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA DAERAH', N'05', N'1', N'000001', N'000001', N'99999', N'40', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'BADAN PENELITIAN DAN PENGEMBANGAN', N'07', N'1', N'000001', N'000001', N'99999', N'41', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'KECAMATAN ASAKOTA', N'01', N' 7', N'000001', N'000001', N'00001', N'42', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'KECAMATAN MPUNDA', N'01', N' 8', N'000001', N'000001', N'00001', N'43', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'KECAMATAN RABA', N'01', N' 9', N'000001', N'000001', N'00001', N'44', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'INSPEKTORAT', N'02', N' 1', N'000001', N'000001', N'00001', N'45', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'BADAN PERENCANAAN PEMBANGUNAN DAERAH, PENELITIAN DAN PENGEMBANGAN', N'03', N' 1', N'000001', N'000001', N'00001', N'46', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH', N'04', N' 1', N'000001', N'000001', N'00001', N'47', N'4')
GO

INSERT INTO [dbo].[ref_unit] ([NM_UNIT], [KD_BIDANG], [KD_UNIT], [USER_UPDATE], [USER_INPUT], [KD_KASDA], [KD_DATA_UNIT], [KD_URUSAN]) VALUES (N'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA', N'05', N' 1', N'000001', N'000001', N'00001', N'48', N'4')
GO

SET IDENTITY_INSERT [dbo].[ref_unit] OFF
GO


-- ----------------------------
-- Table structure for ref_urusan
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_urusan]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_urusan]
GO

CREATE TABLE [dbo].[ref_urusan] (
  [KD_URUSAN] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NM_URUSAN] nvarchar(70) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USER_UPDATE] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_INPUT] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ref_urusan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_urusan
-- ----------------------------
INSERT INTO [dbo].[ref_urusan] VALUES (N'1', N'Urusan Wajib Pelayanan Dasar', N'000001', N'000001')
GO

INSERT INTO [dbo].[ref_urusan] VALUES (N'2', N'Urusan Wajib Bukan Pelayanan Dasar', N'000001', N'000001')
GO

INSERT INTO [dbo].[ref_urusan] VALUES (N'3', N'Urusan Pilihan', N'000001', N'000001')
GO

INSERT INTO [dbo].[ref_urusan] VALUES (N'4', N'Urusan Pemerintahan Fungsi Penunjang', N'000001', N'000001')
GO


-- ----------------------------
-- Table structure for ref_wewenang_menu
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ref_wewenang_menu]') AND type IN ('U'))
	DROP TABLE [dbo].[ref_wewenang_menu]
GO

CREATE TABLE [dbo].[ref_wewenang_menu] (
  [kd_wewenang] varchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [id_menu] nvarchar(999) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama_wewenang] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ref_wewenang_menu] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of ref_wewenang_menu
-- ----------------------------
INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'01', N'2000,2400,2405,2408,3000,3001,3003,3010,3028,3101,3102,3103,3104,3107,3109,3114,3116,3117,4000,4014,5000,5001,5002,9038', N'Data Entry')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'02', N'2000,2400,2402,2404,3000,3001,3028,3101,3104,3107,3109,3110,3112,3114,3116,3117,3119,3120,3121,4000,4014,5000,5001,5002,9038', N'Checker')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'03', N'1000,1001,1003,1006,1018,1020,1101,1102,1103,1104,1105,1106,1305,1306,1307,1311,1354,1357,1359,2000,2400,2404,2405,2408,2410,3000,3001,3002,3003,3028,3101,3102,3103,3104,3107,3110,3112,3114,3116,3117,3120,3121,4000,4004,4005,4006,4010,4011,4012,4013,4014,4015,4016,4017,4018,4019,4020,4021,4023,4024,9038', N'Approval/PencairanA')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'04', NULL, N'Admin kasda')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'05', N'1000,1001,1003,1006,1018,1020,1253,1354,1357,1359,1360,2000,2400,2401,2404,2405,2408,2410,2411,3000,3001,3002,3003,4000,4004,4005,4006,4010,4011,4012,4013,4014,4015,4016,4017,4018,4019,4020,4021,4023,4024', N'admin bank')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'06', N'', N'Operator Bank')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'07', NULL, N'Operator Cabang')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'10', N'1000,1001,1003,1006,1018,1020,1101,1102,1103,1104,1105,1106,1253,1305,1306,1307,1311,1354,1357,1359,1360,2000,2400,2401,2404,2405,2408,2410,2411,3000,3001,3002,3003,3028,3101,3102,3103,3104,3107,3110,3112,3114,3116,3117,4000,4004,4005,4006,4010,4011,4012,4013,4014,4015,4016,4017,4018,4019,4020,4021,4023,4024', N'monitoring')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'11', NULL, N'monitoring dep keu')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'12', NULL, N'petugas cabang')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'13', NULL, N'kuasa anggaran')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'14', N'2000,2400,2402,2410,3000,3001,3002,3003,3028,3101,3103', N'Checker dan Approval')
GO

INSERT INTO [dbo].[ref_wewenang_menu] VALUES (N'SU', N'1000,1001,1003,1006,1018,1020,1101,1102,1103,1104,1105,1106,1305,1306,1307,1311,1340,1353,1354,1357,1359,2000,2400,2402,2404,2405,2408,2410,2412,3000,3001,3002,3003,3010,3028,3101,3102,3103,3104,3107,3109,3110,3112,3114,3116,3117,3119,3120,3121,4000,4004,4005,4006,4010,4011,4012,4013,4014,4015,4016,4017,4018,4019,4020,4021,4023,4024,5000,5001,5002,5003,5005,5006,9038', N'super user')
GO


-- ----------------------------
-- Table structure for TEMP_PENGUJI2
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[TEMP_PENGUJI2]') AND type IN ('U'))
	DROP TABLE [dbo].[TEMP_PENGUJI2]
GO

CREATE TABLE [dbo].[TEMP_PENGUJI2] (
  [Kd_Urusan] tinyint  NOT NULL,
  [Kd_Bidang] tinyint  NOT NULL,
  [Kd_Unit] tinyint  NOT NULL,
  [Kd_Sub] smallint  NOT NULL,
  [Tahun] smallint  NOT NULL,
  [No_SP2D] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tgl_SP2D] datetime  NOT NULL,
  [No_SPM] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tgl_SPM] datetime  NOT NULL,
  [Jn_SPM] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nm_Penerima] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NPWP] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bank_Penerima] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Rek_Penerima] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tgl_Penguji] datetime  NOT NULL,
  [Nm_Bank] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [No_Rekening] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nilai] money  NOT NULL,
  [DateCreate] datetime  NOT NULL,
  [Cair] tinyint  NOT NULL,
  [TglCair] datetime  NOT NULL,
  [Gaji] tinyint  NULL,
  [Nm_Unit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nm_Sub_Unit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Uraian] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_import] datetime  NULL,
  [timestamp_client] datetime  NULL,
  [kd_proses] int  NULL,
  [keterangan_import] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [status] int  NULL,
  [KD_KASDA] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TEMP_PENGUJI2] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of TEMP_PENGUJI2
-- ----------------------------
INSERT INTO [dbo].[TEMP_PENGUJI2] VALUES (N'2', N'9', N'1', N'1', N'2019', N'10236', N'2019-12-16 00:00:00.000', N'267/LS/2.9.1.1/XII/2019', N'2019-12-12 00:00:00.000', N'LS', N'DINAS PERHUBUNGAN (Rekening Titipan)', N'Pembayaran kekurangan dan iuran 3% BPJS Kesehatan tenaga kontrak Dinas Perhubungan Kab. Malinau', N'00.476.076.5-727.000', N'NUSA TENGGARA BARAT', N'0129911123', N'2019-12-16 00:00:00.000', N'NUSA TENGGARA BARAT Cabang Malinau', N'0121300015', N'24300000.0000', N'2019-12-16 09:51:45.527', N'0', N'2020-04-28 14:05:23.000', N'0', N'DINAS PERHUBUNGAN', N'DINAS PERHUBUNGAN', N'', N'2020-04-28 14:05:23.000', N'2020-04-28 14:05:23.000', N'2', N'Data Berhasil di import dari SIMDA', N'2', N'99999')
GO

INSERT INTO [dbo].[TEMP_PENGUJI2] VALUES (N'1', N'2', N'1', N'1', N'2019', N'102384/SP2D/2019', N'2019-12-16 00:00:00.000', N'3116/LS/1.2.1.1/XI/2019', N'2019-11-11 00:00:00.000', N'LS', N'RAFEAH', N'Bayar belanja Makan dan Minuman Kegiatan Pengembangan SIK Keg 37.01', N'14.842.456.7-727.000', N'NUSA TENGGARA BARAT', N'0122124282', N'2019-12-16 00:00:00.000', N'NUSA TENGGARA BARAT Cabang Malinau', N'0121300015', N'3511200.0000', N'2019-12-16 09:51:45.527', N'0', N'2020-04-28 14:05:25.000', N'0', N'DINAS KESEHATAN, PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA ', N'DINAS KESEHATAN, PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA', N'', N'2020-04-28 14:05:25.000', N'2020-04-28 14:05:25.000', N'2', N'Data Berhasil di import dari SIMDA', N'2', N'99999')
GO


-- ----------------------------
-- Table structure for TEMP_POTONGAN
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[TEMP_POTONGAN]') AND type IN ('U'))
	DROP TABLE [dbo].[TEMP_POTONGAN]
GO

CREATE TABLE [dbo].[TEMP_POTONGAN] (
  [No_SPM] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Urusan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Sub_Unit] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [User_Update] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nilai] money  NULL,
  [Masa] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [No_SP2D] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [User_Input] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tahun] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [No_SP2D_Non_Anggaran] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Bidang] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Unit] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jn_SPM] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Kasda] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Rek_1] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Rek_2] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Rek_3] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Rek_4] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Rek_5] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nm_Rekening] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_billing] varchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NTPN] varchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglTrx_NTPN] datetime DEFAULT NULL NULL,
  [tglBuku_NTPN] datetime DEFAULT NULL NULL
)
GO

ALTER TABLE [dbo].[TEMP_POTONGAN] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'Nilai Potongan SP2D',
'SCHEMA', N'dbo',
'TABLE', N'TEMP_POTONGAN',
'COLUMN', N'Nilai'
GO


-- ----------------------------
-- Records of TEMP_POTONGAN
-- ----------------------------
INSERT INTO [dbo].[TEMP_POTONGAN] VALUES (N'3116/LS/1.2.1.1/XI/2019', N'1', N'1', NULL, N'79800.0000', N'04', N'102384/SP2D/2019', N'CMS01', N'2019', NULL, N'02', N'1', N'LS', N'99999', N'7', N'1', N'1', N'4', N'3', N'Penerimaan PFK - PPh Ps. 23', N'', N'', NULL, NULL)
GO

INSERT INTO [dbo].[TEMP_POTONGAN] VALUES (N'3116/LS/1.2.1.1/XI/2019', N'1', N'1', NULL, N'399000.0000', N'04', N'102384/SP2D/2019', N'CMS01', N'2019', NULL, N'02', N'1', N'LS', N'99999', N'7', N'1', N'1', N'7', N'1', N'Penerimaan PFK - Lainnya', N'', N'', NULL, NULL)
GO


-- ----------------------------
-- Table structure for tgl_libur
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tgl_libur]') AND type IN ('U'))
	DROP TABLE [dbo].[tgl_libur]
GO

CREATE TABLE [dbo].[tgl_libur] (
  [ID] int  NOT NULL,
  [TANGGAL] date  NULL,
  [KD_KASDA] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KETERANGAN] nvarchar(299) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[tgl_libur] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tgl_libur
-- ----------------------------
INSERT INTO [dbo].[tgl_libur] VALUES (N'1', N'2020-01-07', N'00001', N'CUTI BERSAMA')
GO

INSERT INTO [dbo].[tgl_libur] VALUES (N'2', N'2020-01-07', N'00001', N'HARI JADI BIMA')
GO


-- ----------------------------
-- Table structure for TrxSP2D
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[TrxSP2D]') AND type IN ('U'))
	DROP TABLE [dbo].[TrxSP2D]
GO

CREATE TABLE [dbo].[TrxSP2D] (
  [Kd_Urusan] tinyint  NULL,
  [Kd_Bidang] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Unit] tinyint  NULL,
  [Kd_Sub] smallint  NULL,
  [Tahun] smallint  NOT NULL,
  [No_SP2D] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tgl_SP2D] datetime  NULL,
  [No_SPM] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tgl_SPM] datetime  NULL,
  [Jn_SPM] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nm_Penerima] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NPWP] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bank_Penerima] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Rek_Penerima] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tgl_Penguji] datetime  NULL,
  [Nm_Bank] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [No_Rekening] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nilai] money  NULL,
  [DateCreate] datetime  NULL,
  [STATUS] int  NULL,
  [USER_PENCAIRAN] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TOTAL_SP2D] money  NULL,
  [TglCair] date  NULL,
  [KD_KASDA] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status_Cair] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [deleted] int  NULL,
  [user_input] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_input] datetime  NULL,
  [user_verifikasi] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_verifikasi] datetime  NULL,
  [Cair] int  NULL,
  [Gaji] int  NULL,
  [Nm_Unit] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nm_Sub_Unit] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Uraian] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TrxSP2D] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'status import data, verifikasi dan pencairan',
'SCHEMA', N'dbo',
'TABLE', N'TrxSP2D',
'COLUMN', N'STATUS'
GO


-- ----------------------------
-- Records of TrxSP2D
-- ----------------------------
INSERT INTO [dbo].[TrxSP2D] VALUES (N'2', N'09', N'1', N'1', N'2019', N'10236', N'2019-12-16 00:00:00.000', N'267/LS/2.9.1.1/XII/2019', N'2019-12-12 00:00:00.000', N'LS', N'DINAS PERHUBUNGAN (Rekening Titipan)', N'Pembayaran kekurangan dan iuran 3% BPJS Kesehatan tenaga kontrak Dinas Perhubungan Kab. Malinau', N'00.476.076.5-727.000', N'NUSA TENGGARA BARAT', N'0129911123', N'2019-12-16 00:00:00.000', N'NUSA TENGGARA BARAT Cabang Malinau', N'0121300015', N'24300000.0000', N'2019-12-16 09:51:45.527', N'3', N'CMS01', N'24300000.0000', N'2020-04-28', N'99999', N'1', NULL, N'CMS01', NULL, N'CMS01', N'2020-04-30 09:16:36.000', N'0', N'0', N'DINAS PERHUBUNGAN', N'DINAS PERHUBUNGAN', N'')
GO

INSERT INTO [dbo].[TrxSP2D] VALUES (N'1', N'02', N'1', N'1', N'2019', N'102384/SP2D/2019', N'2019-12-16 00:00:00.000', N'3116/LS/1.2.1.1/XI/2019', N'2019-11-11 00:00:00.000', N'LS', N'RAFEAH', N'Bayar belanja Makan dan Minuman Kegiatan Pengembangan SIK Keg 37.01', N'14.842.456.7-727.000', N'NUSA TENGGARA BARAT', N'0122124282', N'2019-12-16 00:00:00.000', N'NUSA TENGGARA BARAT Cabang Malinau', N'0121300015', N'3032400.0000', N'2019-12-16 09:51:45.527', N'0', NULL, N'3511200.0000', N'2020-04-28', N'99999', NULL, NULL, N'CMS01', NULL, NULL, NULL, N'0', N'0', N'DINAS KESEHATAN, PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA ', N'DINAS KESEHATAN, PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA', N'')
GO


-- ----------------------------
-- Table structure for TrxSP2D_koreksi
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[TrxSP2D_koreksi]') AND type IN ('U'))
	DROP TABLE [dbo].[TrxSP2D_koreksi]
GO

CREATE TABLE [dbo].[TrxSP2D_koreksi] (
  [No_SP2D] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [tanggal] date  NOT NULL,
  [alasan] nvarchar(500) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kd_user] varchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TrxSP2D_koreksi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TrxSP2D_Potongan
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[TrxSP2D_Potongan]') AND type IN ('U'))
	DROP TABLE [dbo].[TrxSP2D_Potongan]
GO

CREATE TABLE [dbo].[TrxSP2D_Potongan] (
  [No_SPM] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Urusan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Sub_Unit] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [User_Update] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nilai] money  NULL,
  [Masa] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [No_SP2D] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [User_Input] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tahun] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [No_SP2D_Non_Anggaran] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Bidang] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Unit] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jn_SPM] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Kasda] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Rek_1] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Rek_2] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Rek_3] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Rek_4] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_Rek_5] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nm_Rekening] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_billing] varchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NTPN] varchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglTrx_NTPN] datetime DEFAULT NULL NULL,
  [tglBuku_NTPN] datetime DEFAULT NULL NULL
)
GO

ALTER TABLE [dbo].[TrxSP2D_Potongan] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'Nilai Potongan SP2D',
'SCHEMA', N'dbo',
'TABLE', N'TrxSP2D_Potongan',
'COLUMN', N'Nilai'
GO


-- ----------------------------
-- Records of TrxSP2D_Potongan
-- ----------------------------
INSERT INTO [dbo].[TrxSP2D_Potongan] VALUES (N'3116/LS/1.2.1.1/XI/2019', N'1', N'1', NULL, N'79800.0000', N'04', N'102384/SP2D/2019', N'CMS01', N'2019', NULL, N'02', N'1', N'LS', N'99999', N'7', N'1', N'1', N'4', N'3', N'Penerimaan PFK - PPh Ps. 23', N'', N'', NULL, NULL)
GO

INSERT INTO [dbo].[TrxSP2D_Potongan] VALUES (N'3116/LS/1.2.1.1/XI/2019', N'1', N'1', NULL, N'399000.0000', N'04', N'102384/SP2D/2019', N'CMS01', N'2019', NULL, N'02', N'1', N'LS', N'99999', N'7', N'1', N'1', N'7', N'1', N'Penerimaan PFK - Lainnya', N'', N'', NULL, NULL)
GO


-- ----------------------------
-- Table structure for TrxSPJ
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[TrxSPJ]') AND type IN ('U'))
	DROP TABLE [dbo].[TrxSPJ]
GO

CREATE TABLE [dbo].[TrxSPJ] (
  [Tahun] smallint  NOT NULL,
  [No_Bukti] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Jns_Dok] tinyint  NOT NULL,
  [Kd_Urusan] tinyint  NOT NULL,
  [Kd_Bidang] tinyint  NOT NULL,
  [Kd_Unit] tinyint  NOT NULL,
  [Kd_Sub] smallint  NOT NULL,
  [Tgl_Bukti] datetime  NOT NULL,
  [Nm_Penerima] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bank_Penerima] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Rek_Penerima] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NPWP] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nm_Bank] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [No_Rekening] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nilai] money  NOT NULL,
  [DateCreate] datetime  NOT NULL,
  [Cair] tinyint  NOT NULL,
  [TglCair] datetime  NULL,
  [Nm_Unit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nm_Sub_Unit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Uraian] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TrxSPJ] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TrxSPM
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[TrxSPM]') AND type IN ('U'))
	DROP TABLE [dbo].[TrxSPM]
GO

CREATE TABLE [dbo].[TrxSPM] (
  [Tahun] smallint  NOT NULL,
  [No_SPM] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nm_Penerima] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bank_Penerima] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Rek_Penerima] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] tinyint  NOT NULL,
  [DateCreate] datetime  NOT NULL,
  [Uraian] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nm_Unit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nm_Sub_Unit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TrxSPM] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'0: Data baru dari simda
1: Pengecekan sukses
2: Pengecekan gagal (isi keterangan gagal nya di
Uraian)
3: Rekening tujuan ke Bank Lain',
'SCHEMA', N'dbo',
'TABLE', N'TrxSPM',
'COLUMN', N'Status'
GO

EXEC sp_addextendedproperty
'MS_Description', N'Uraian dari Status jika pengecekan rekening gagal,
contoh:
“Nomor Rekening Tidak Ditemukan”
“Nama Rekening Tidak Sesuai: SURYA ANGKASA, CV”
“Rekening Tidak Aktif”
dll',
'SCHEMA', N'dbo',
'TABLE', N'TrxSPM',
'COLUMN', N'Uraian'
GO


-- ----------------------------
-- Table structure for user_system
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[user_system]') AND type IN ('U'))
	DROP TABLE [dbo].[user_system]
GO

CREATE TABLE [dbo].[user_system] (
  [KD_KASDA] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USERNAME] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NM_USER] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STATUS] int  NULL,
  [PASSWORD_EXPIRED] datetime2(7)  NULL,
  [MAX_ERROR_LOGIN] int  NULL,
  [STATUS_LOGIN] int  NULL,
  [PASSWORD] nvarchar(300) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [LEVEL_USER] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ERROR_LOGIN] int  NULL,
  [KD_SPV] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USER_INPUT] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[user_system] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of user_system
-- ----------------------------
INSERT INTO [dbo].[user_system] VALUES (N'99999', N'CMS01', N'SUPER ADMIN', N'1', N'2019-12-12 00:00:00.0000000', N'3', N'1', N'fcfe6ae4eb5ec851c216e4e36e11567d', N'SU', NULL, NULL, NULL)
GO

INSERT INTO [dbo].[user_system] VALUES (N'00001', N'D0001', N'HAMDAN', N'1', N'2020-01-31 00:00:00.0000000', N'3', N'0', N'c39e7d92ec6f78b99f4df8176f52891c', N'01', NULL, NULL, N'CMS01')
GO

INSERT INTO [dbo].[user_system] VALUES (N'00001', N'D0002', N'NELLA', N'1', N'2022-12-12 00:00:00.0000000', N'3', N'0', N'22887d774c6a1e02ba48376e97d19206', N'14', NULL, NULL, N'CMS01')
GO

INSERT INTO [dbo].[user_system] VALUES (N'00001', N'MTR02', N'MATARAM 02', N'1', N'2021-01-01 00:00:00.0000000', N'3', N'1', N'c70213d5044915d22491e338d1534202', N'02', NULL, NULL, N'CMS01')
GO

INSERT INTO [dbo].[user_system] VALUES (N'00001', N'MTR03', N'MATARAM 032', N'1', N'2021-01-01 00:00:00.0000000', N'3', N'1', N'73185c430ce8ce280a0edd55ecc5d7f6', N'03', NULL, NULL, N'CMS01')
GO

INSERT INTO [dbo].[user_system] VALUES (N'00001', N'MTR04', N'MATARAM 04', N'1', N'2021-01-01 00:00:00.0000000', N'1', N'1', N'16ad58c1c1de05ed540f5ec9022aba68', NULL, NULL, NULL, N'CMS01')
GO

INSERT INTO [dbo].[user_system] VALUES (N'00001', N'MTR05', N'MATARAM 05', N'1', N'2019-01-01 00:00:00.0000000', N'0', N'1', N'ae8bfdd98f42db59403b8021e4b741a7', NULL, N'0', NULL, N'CMS01')
GO


-- ----------------------------
-- Table structure for validasi_interface
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[validasi_interface]') AND type IN ('U'))
	DROP TABLE [dbo].[validasi_interface]
GO

CREATE TABLE [dbo].[validasi_interface] (
  [id_validasi_interface] int  NOT NULL,
  [keterangan_validasi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jenis_validasi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[validasi_interface] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of validasi_interface
-- ----------------------------
INSERT INTO [dbo].[validasi_interface] VALUES (N'1', N'Nama pemilik harus sesui dengan yang ada di core banking', N'validasi No Rekening')
GO

INSERT INTO [dbo].[validasi_interface] VALUES (N'2', N'lakukan pengecekan RKUD', N'validasi No Rekening')
GO

INSERT INTO [dbo].[validasi_interface] VALUES (N'4', N'lakukan pengecekan status rekening penerima', N'')
GO

INSERT INTO [dbo].[validasi_interface] VALUES (N'5', N'lakukan pengecekan maping kode MAP', N'validasi SP2D')
GO

INSERT INTO [dbo].[validasi_interface] VALUES (N'6', N'lakukan pengecekan kode SKPD', N'validasi SP2D')
GO

INSERT INTO [dbo].[validasi_interface] VALUES (N'7', N'Tolak proses input jika SP2D sudah di verifikasi', N'validasi SP2D')
GO

INSERT INTO [dbo].[validasi_interface] VALUES (N'8', N'Tolak proses input jika SP2D sudah di cairkan', N'validasi SP2D')
GO

INSERT INTO [dbo].[validasi_interface] VALUES (N'9', N'Simpan Log temporary', N'validasi SP2D')
GO


-- ----------------------------
-- View structure for v_data_skpd
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[v_data_skpd]') AND type IN ('V'))
	DROP VIEW [dbo].[v_data_skpd]
GO

CREATE VIEW [dbo].[v_data_skpd] AS SELECT        KD_URUSAN + '.' + KD_BIDANG + '.' + KD_UNIT + '.' + KD_SUB_UNIT AS kd_gabungan, NM_SUB_UNIT AS nama_skpd
FROM            dbo.ref_sub_unit
GO


-- ----------------------------
-- Procedure structure for get_daftar_skpd
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[get_daftar_skpd]') AND type IN ('P', 'PC', 'RF', 'X'))
	DROP PROCEDURE[dbo].[get_daftar_skpd]
GO

CREATE PROCEDURE [dbo].[get_daftar_skpd]
@Kasda varchar(30)
AS
BEGIN
	SELECT  KD_URUSAN + '.' + KD_BIDANG + '.' + KD_UNIT + '.' + KD_SUB_UNIT AS 			kd_gabungan, 
NM_SUB_UNIT AS nama_skpd
FROM dbo.ref_sub_unit  WHERE KD_KASDA = @Kasda ;

END
GO


-- ----------------------------
-- Procedure structure for TEMP_PENGUJI2_check_duplikat_SP2D_dan_tahun
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[TEMP_PENGUJI2_check_duplikat_SP2D_dan_tahun]') AND type IN ('P', 'PC', 'RF', 'X'))
	DROP PROCEDURE[dbo].[TEMP_PENGUJI2_check_duplikat_SP2D_dan_tahun]
GO

CREATE PROCEDURE [dbo].[TEMP_PENGUJI2_check_duplikat_SP2D_dan_tahun]
@No varchar(30)
AS
BEGIN
	
	SELECT * FROM TEMP_PENGUJI2 WHERE No_SP2D = @No;
	
END
GO


-- ----------------------------
-- Primary Key structure for table config_api
-- ----------------------------
ALTER TABLE [dbo].[config_api] ADD CONSTRAINT [PK__config_a__3213E83F3493CFA7] PRIMARY KEY CLUSTERED ([id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table hari_libur
-- ----------------------------
ALTER TABLE [dbo].[hari_libur] ADD CONSTRAINT [PK__hari_lib__252A42795CA1C101] PRIMARY KEY CLUSTERED ([KD_KASDA])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table pemeliharaan_validasi_interface
-- ----------------------------
ALTER TABLE [dbo].[pemeliharaan_validasi_interface] ADD CONSTRAINT [PK__pemeliha__56AD0E167B264821] PRIMARY KEY CLUSTERED ([id_validasi_interface])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for ref_approval_rek_kasda
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_approval_rek_kasda]', RESEED, 9)
GO


-- ----------------------------
-- Auto increment value for ref_bank
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_bank]', RESEED, 17)
GO


-- ----------------------------
-- Auto increment value for ref_bidang
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_bidang]', RESEED, 33)
GO


-- ----------------------------
-- Primary Key structure for table ref_bidang
-- ----------------------------
ALTER TABLE [dbo].[ref_bidang] ADD CONSTRAINT [PK_ref_bidang] PRIMARY KEY CLUSTERED ([KD_DATA_BIDANG])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table ref_jam_transaksi
-- ----------------------------
ALTER TABLE [dbo].[ref_jam_transaksi] ADD CONSTRAINT [PK__ref_jam___252A4279662B2B3B] PRIMARY KEY CLUSTERED ([KD_KASDA])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for ref_jenis_spm
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_jenis_spm]', RESEED, 6)
GO


-- ----------------------------
-- Primary Key structure for table ref_kasda
-- ----------------------------
ALTER TABLE [dbo].[ref_kasda] ADD CONSTRAINT [PK_ref_kasda] PRIMARY KEY CLUSTERED ([KD_KASDA])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for ref_kd_konfigurasi_kasda
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_kd_konfigurasi_kasda]', RESEED, 1)
GO


-- ----------------------------
-- Auto increment value for ref_konfigurasi_kasda
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_konfigurasi_kasda]', RESEED, 1)
GO


-- ----------------------------
-- Auto increment value for ref_map
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_map]', RESEED, 9)
GO


-- ----------------------------
-- Primary Key structure for table ref_map
-- ----------------------------
ALTER TABLE [dbo].[ref_map] ADD CONSTRAINT [PK_ref_map] PRIMARY KEY CLUSTERED ([KD_DATA])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for ref_maping_map
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_maping_map]', RESEED, 9)
GO


-- ----------------------------
-- Primary Key structure for table ref_menu
-- ----------------------------
ALTER TABLE [dbo].[ref_menu] ADD CONSTRAINT [PK__ref_menu__68A1D9DB3864608B] PRIMARY KEY CLUSTERED ([id_menu])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for ref_pemeliharaan_akses_rek_koran
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_pemeliharaan_akses_rek_koran]', RESEED, 42)
GO


-- ----------------------------
-- Primary Key structure for table ref_pemeliharaan_akses_rek_koran
-- ----------------------------
ALTER TABLE [dbo].[ref_pemeliharaan_akses_rek_koran] ADD CONSTRAINT [PK_ref_pemeliharaan_akses_rek_kasda] PRIMARY KEY CLUSTERED ([KD_DATA])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for ref_potongan_transaksi
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_potongan_transaksi]', RESEED, 13)
GO


-- ----------------------------
-- Auto increment value for ref_rek_kasda
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_rek_kasda]', RESEED, 12)
GO


-- ----------------------------
-- Auto increment value for ref_rek_potongan
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_rek_potongan]', RESEED, 4)
GO


-- ----------------------------
-- Auto increment value for ref_rek_skpd
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_rek_skpd]', RESEED, 5)
GO


-- ----------------------------
-- Auto increment value for ref_rek_sumber
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_rek_sumber]', RESEED, 14)
GO


-- ----------------------------
-- Auto increment value for ref_sub_unit
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_sub_unit]', RESEED, 366)
GO


-- ----------------------------
-- Primary Key structure for table ref_sub_unit
-- ----------------------------
ALTER TABLE [dbo].[ref_sub_unit] ADD CONSTRAINT [PK_ref_sub_unit] PRIMARY KEY CLUSTERED ([KD_DATA_SUB_UNIT])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table ref_terminal
-- ----------------------------
ALTER TABLE [dbo].[ref_terminal] ADD CONSTRAINT [PK__ref_term__06E0561455F4C372] PRIMARY KEY CLUSTERED ([KD_TERMINAL])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for ref_unit
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[ref_unit]', RESEED, 48)
GO


-- ----------------------------
-- Primary Key structure for table ref_unit
-- ----------------------------
ALTER TABLE [dbo].[ref_unit] ADD CONSTRAINT [PK_ref_unit] PRIMARY KEY CLUSTERED ([KD_DATA_UNIT])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table ref_urusan
-- ----------------------------
ALTER TABLE [dbo].[ref_urusan] ADD CONSTRAINT [PK_ref_urusan] PRIMARY KEY CLUSTERED ([KD_URUSAN])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table ref_wewenang_menu
-- ----------------------------
ALTER TABLE [dbo].[ref_wewenang_menu] ADD CONSTRAINT [PK__ref_wewe__A02A743E5224328E] PRIMARY KEY CLUSTERED ([kd_wewenang])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table tgl_libur
-- ----------------------------
ALTER TABLE [dbo].[tgl_libur] ADD CONSTRAINT [PK__tgl_libu__3214EC27607251E5] PRIMARY KEY CLUSTERED ([ID])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table TrxSP2D
-- ----------------------------
ALTER TABLE [dbo].[TrxSP2D] ADD CONSTRAINT [PK_TrxSP2D] PRIMARY KEY CLUSTERED ([No_SP2D], [Tahun])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table TrxSPJ
-- ----------------------------
ALTER TABLE [dbo].[TrxSPJ] ADD CONSTRAINT [PK_TrxSPJ] PRIMARY KEY CLUSTERED ([Tahun], [No_Bukti], [Jns_Dok])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table TrxSPM
-- ----------------------------
ALTER TABLE [dbo].[TrxSPM] ADD CONSTRAINT [PK_TrxSPM] PRIMARY KEY CLUSTERED ([Tahun], [No_SPM])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table user_system
-- ----------------------------
ALTER TABLE [dbo].[user_system] ADD CONSTRAINT [PK__user_sys__B15BE12F43D61337] PRIMARY KEY CLUSTERED ([USERNAME])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table validasi_interface
-- ----------------------------
ALTER TABLE [dbo].[validasi_interface] ADD CONSTRAINT [PK__pemeliha__56AD0E167B264821_copy1] PRIMARY KEY CLUSTERED ([id_validasi_interface])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

