--Modernisasi Pengelolaan BLU
SELECT
  entry_id,
  periode AS time,
  CONCAT(
    CASE
      WHEN EXTRACT(
        MONTH
       
FROM
          "dashboard"."modernisasi_pengelolaan_blu"."periode"
      ) = 6 THEN 'Semester 1'
      ELSE 'Semester 2'
    END,
    ' - ',
    CAST(
      EXTRACT(
        YEAR
        FROM
          "dashboard"."modernisasi_pengelolaan_blu"."periode"
      ) AS VARCHAR
    )
  ) AS Periode
from
  dashboard.modernisasi_pengelolaan_blu


--Integrasi Data
SELECT
  "entry_id" as ID,
  CASE
    WHEN "Integrasi Data"."id_secret_key_dev" = TRUE THEN 0.1 * 20
    ELSE 0
  END + CASE
    WHEN "Integrasi Data"."id_pengiriman_data_dev" = TRUE THEN 0.5 * 20
    ELSE 0
  END + CASE
    WHEN "Integrasi Data"."id_otomasi_pengiriman" = TRUE THEN 0.4 * 20
    ELSE 0
  END + CASE
    WHEN "Integrasi Data"."id_secret_key_prod" = TRUE THEN 0.1 * 20
    ELSE 0
  END + CASE
    WHEN "Integrasi Data"."id_pengiriman_data_prod" = TRUE THEN 0.9 * 20
    ELSE 0
  END + (
    CAST(
      "Integrasi Data"."id_jumlah_pengiriman_data_harian" AS float
    ) / 365.0
  ) * 0.5 * 60 + (
    (
      CAST(
        "Integrasi Data"."id_jumlah_data_keuangan" AS float
      ) + CAST("Integrasi Data"."id_jumlah_data_layanan" AS float) + CAST("Integrasi Data"."id_jumlah_data_sdm" AS float)
    ) / NULLIF("Integrasi Data"."id_jumlah_total_data", 0)
  ) * 0.5 * 60 AS "Integrasi Data Score"
FROM
  "dashboard"."modernisasi_pengelolaan_blu"
 
LEFT JOIN "dashboard"."integrasi_data" AS "Integrasi Data" ON "dashboard"."modernisasi_pengelolaan_blu"."entry_id" = "Integrasi Data"."id"
ORDER BY
  "dashboard"."modernisasi_pengelolaan_blu"."periode" ASC

  --Analitika Data
  SELECT
  "entry_id" as ID,
  CASE
    WHEN "Analitika Data"."ad_layanan_kinerja" = TRUE THEN 0.4 * 30
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_layanan_jumlah_pengguna" = TRUE THEN 0.1 * 30
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_layanan_trend_pemberian_layanan" = TRUE THEN 0.1 * 30
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_layanan_hasil_survey_pengguna" = TRUE THEN 0.1 * 30
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_layanan_akses_ppkblu" = TRUE THEN 0.3 * 30
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_keuangan_realisasi_pb" = TRUE THEN 0.2 * 30
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_keuangan_saldo_rekening_blu" = TRUE THEN 0.2 * 30
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_keuangan_jumlah_kas" = TRUE THEN 0.2 * 30
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_keuangan_analisis_data_keuangan" = TRUE THEN 0.2 * 30
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_keuangan_akses_ppkblu" = TRUE THEN 0.2 * 30
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_sdm_komposisi_sdm" = TRUE THEN 0.3 * 20
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_sdm_profil_sdm" = TRUE THEN 0.3 * 20
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_sdm_analisis_kebutuhan_pegawai" = TRUE THEN 0.1 * 20
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_sdm_analisis_beban_kerja" = TRUE THEN 0.1 * 20
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_sdm_analisis_kinerja_pegawai" = TRUE THEN 0.1 * 20
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_sdm_training_need_analysis" = TRUE THEN 0.1 * 20
    ELSE 0
  END + CASE
    WHEN "Analitika Data"."ad_jumlah_dashboard_pendukung" >= 2 THEN 20
    ELSE 0
  END AS "Analitika Data Score"
FROM
  "dashboard"."modernisasi_pengelolaan_blu"
 
LEFT JOIN "dashboard"."analitika_data" AS "Analitika Data" ON "dashboard"."modernisasi_pengelolaan_blu"."entry_id" = "Analitika Data"."id"
ORDER BY
  "dashboard"."modernisasi_pengelolaan_blu"."periode" ASC;

  --SIM
  SELECT
  "entry_id" as ID,
  CASE
    WHEN "Sistem Informasi Manajemen"."sim_keuangan_penerimaan_blu" = TRUE THEN 0.3 * 20
    ELSE 0
  END + CASE
    WHEN "Sistem Informasi Manajemen"."sim_keuangan_pengeluaran_blu" = TRUE THEN 0.3 * 20
    ELSE 0
  END + CASE
    WHEN "Sistem Informasi Manajemen"."sim_keuangan_pencatatan_saldo_blu" = TRUE THEN 0.4 * 20
    ELSE 0
  END + CASE
    WHEN "Sistem Informasi Manajemen"."sim_layanan_pencatatan_blu" = TRUE THEN 0.8 * 60
    ELSE 0
  END + CASE
    WHEN "Sistem Informasi Manajemen"."sim_layanan_integrasi_keuangan" = TRUE THEN 0.2 * 60
    ELSE 0
  END + CASE
    WHEN "Sistem Informasi Manajemen"."sim_sdm_pencatatan_sdm" = TRUE THEN 0.6 * 20
    ELSE 0
  END + CASE
    WHEN "Sistem Informasi Manajemen"."sim_sdm_kinerja_sdm" = TRUE THEN 0.4 * 20
    ELSE 0
  END AS "Sistem Informasi Manajemen Score"
FROM
  "dashboard"."modernisasi_pengelolaan_blu"
 
LEFT JOIN "dashboard"."sistem_informasi_manajemen" AS "Sistem Informasi Manajemen" ON "dashboard"."modernisasi_pengelolaan_blu"."entry_id" = "Sistem Informasi Manajemen"."id"
ORDER BY
  "dashboard"."modernisasi_pengelolaan_blu"."periode" ASC;

  --Website
  SELECT
  "entry_id" as ID,
  CASE
    WHEN "Website"."web_uji_performa_akses" < 0.2 THEN 0.5 * 40
    WHEN ("Website"."web_uji_performa_akses" >= 0.2)
   
   AND ("Website"."web_uji_performa_akses" <= 0.4) THEN 0.75 * 40
    WHEN "Website"."web_uji_performa_akses" > 0.4 THEN 1 * 40
  END + CASE
    WHEN "Website"."web_informasi_profil_blu" = TRUE THEN 0.2 * 60
    ELSE 0
  END + CASE
    WHEN "Website"."web_informasi_layanan_blu" = TRUE THEN 0.2 * 60
    ELSE 0
  END + CASE
    WHEN "Website"."web_tata_kelola_blu" = TRUE THEN 0.2 * 60
    ELSE 0
  END + CASE
    WHEN "Website"."web_fitur_pengaduan" = TRUE THEN 0.2 * 60
    ELSE 0
  END + CASE
    WHEN "Website"."web_survey_layanan" = TRUE THEN 0.2 * 60
    ELSE 0
  END AS "Website Score"
FROM
  "dashboard"."modernisasi_pengelolaan_blu"
 
LEFT JOIN "dashboard"."website" AS "Website" ON "dashboard"."modernisasi_pengelolaan_blu"."entry_id" = "Website"."id"
ORDER BY
  "dashboard"."modernisasi_pengelolaan_blu"."periode" ASC;

  --Extramiles
  SELECT
  "entry_id" as ID,
  CASE
    WHEN "Extramiles"."id_pengiriman_data" = 1 THEN 0.5 * 12
    WHEN "Extramiles"."id_pengiriman_data" = 2 THEN 0.75 * 12
    WHEN "Extramiles"."id_pengiriman_data" = 3 THEN 1 * 12
  END + CASE
    WHEN "Extramiles"."ad_sdm_khusus" = TRUE THEN 4
    ELSE 0
  END + CASE
    WHEN "Extramiles"."ad_analisis_prediktif" = TRUE THEN 4
    ELSE 0
  END + CASE
    WHEN "Extramiles"."sim_mobile_layanan" = TRUE THEN 6
    ELSE 0
  END + CASE
    WHEN "Extramiles"."web_seo" = TRUE THEN 4
    ELSE 0
  END AS "Extramiles Score"
FROM
  "dashboard"."modernisasi_pengelolaan_blu"
 
LEFT JOIN "dashboard"."extramiles" AS "Extramiles" ON "dashboard"."modernisasi_pengelolaan_blu"."entry_id" = "Extramiles"."id"
ORDER BY
  "dashboard"."modernisasi_pengelolaan_blu"."periode" ASC;