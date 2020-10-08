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

 Date: 04/05/2020 10:33:45
*/


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

