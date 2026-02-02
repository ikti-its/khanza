-- Modul C (Fathur, Ruben)
-- Jadwal Pegawai
CREATE OR REPLACE FUNCTION default_jadwal_pegawai(IN new_id UUID)
RETURNS VOID AS $$
BEGIN
    INSERT INTO jadwal_pegawai (id_pegawai, id_hari, id_shift)
    SELECT new_id, hari.id, 'NA'
    FROM ref.hari;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION trigger_init_jadwal_pegawai()
RETURNS TRIGGER AS $$
BEGIN
    PERFORM default_jadwal_pegawai(NEW.id);
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION update_jadwal_pegawai_on_delete(IN pegawai_id UUID)
RETURNS VOID AS $$
BEGIN
  UPDATE jadwal_pegawai
  SET deleted_at = CURRENT_TIMESTAMP
  WHERE id_pegawai = pegawai_id;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION trigger_update_jadwal_pegawai_on_delete()
RETURNS TRIGGER AS $$
BEGIN
    PERFORM update_jadwal_pegawai_on_delete(OLD.id);
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER init_jadwal_pegawai
AFTER INSERT ON pegawai
FOR EACH ROW
EXECUTE PROCEDURE trigger_init_jadwal_pegawai();

CREATE TRIGGER update_jadwal_pegawai_on_delete
BEFORE UPDATE ON pegawai
FOR EACH ROW
WHEN (OLD.deleted_at IS NULL AND NEW.deleted_at IS NOT NULL)
EXECUTE FUNCTION trigger_update_jadwal_pegawai_on_delete();

-- Modul D (Leo)
-- Trigger jenis barang medis dengan barang medis
-- CREATE OR REPLACE FUNCTION update_related_deleted_at()
-- RETURNS TRIGGER AS $$
-- BEGIN
--     IF OLD.deleted_at IS NOT DISTINCT FROM NEW.deleted_at THEN
--         RETURN NEW; -- Jika deleted_at tidak berubah, keluar dari fungsi
--     END IF;

--     -- Update deleted_at di tabel obat
--     UPDATE obat
--     SET deleted_at = NEW.deleted_at
--     WHERE obat.id_barang_medis = OLD.id;

--     -- Update deleted_at di tabel bahan_habis_pakai
--     UPDATE bahan_habis_pakai
--     SET deleted_at = NEW.deleted_at
--     WHERE bahan_habis_pakai.id_barang_medis = OLD.id;

--     -- Update deleted_at di tabel alat_kesehatan
--     UPDATE alat_kesehatan
--     SET deleted_at = NEW.deleted_at
--     WHERE alat_kesehatan.id_barang_medis = OLD.id;

--     -- Update deleted_at di tabel darah
--     UPDATE darah
--     SET deleted_at = NEW.deleted_at
--     WHERE darah.id_barang_medis = OLD.id;

--     RETURN NEW;
-- END;
-- $$ LANGUAGE plpgsql;

-- CREATE TRIGGER update_related_deleted_at_trigger
-- AFTER UPDATE OF deleted_at ON barang_medis
-- FOR EACH ROW
-- EXECUTE FUNCTION update_related_deleted_at();

-- Persetujuan pengajuan
-- CREATE OR REPLACE FUNCTION update_status_pengajuan()
-- RETURNS TRIGGER AS $$
-- BEGIN
--     IF NEW.status_apoteker = 'Ditolak' OR NEW.status_keuangan = 'Ditolak' THEN
--     NEW.status := 'Ditolak';
-- ELSIF NEW.status_apoteker = 'Disetujui' AND NEW.status_keuangan = 'Disetujui' THEN
--     NEW.status := 'Disetujui';
-- ELSE
--     NEW.status := 'Menunggu Persetujuan';
-- END IF;
--     RETURN NEW;
-- END;
-- $$ LANGUAGE plpgsql;

-- CREATE TRIGGER trigger_update_status_pengajuan
-- BEFORE INSERT OR UPDATE OF status_apoteker, status_keuangan ON persetujuan_pengajuan
-- FOR EACH ROW
-- EXECUTE FUNCTION update_status_pengajuan();

-- -- Status Pesanan Pengajuan
-- CREATE OR REPLACE FUNCTION update_status_pesanan()
-- RETURNS TRIGGER AS $$
-- BEGIN
--     IF NEW.status = 'Disetujui' THEN
--     UPDATE pengajuan_barang_medis
--     SET status_pesanan = '2'
--     WHERE id = NEW.id_pengajuan;
-- ELSIF NEW.status = 'Ditolak' THEN
--     UPDATE pengajuan_barang_medis
--     SET status_pesanan = '1'
--     WHERE id = NEW.id_pengajuan;
-- ELSE
--     UPDATE pengajuan_barang_medis
--     SET status_pesanan = '0'
--     WHERE id = NEW.id_pengajuan;
-- END IF;
--     RETURN NEW;
-- END;
-- $$ LANGUAGE plpgsql;

-- CREATE TRIGGER update_status_trigger
-- AFTER UPDATE ON persetujuan_pengajuan
-- FOR EACH ROW
-- EXECUTE FUNCTION update_status_pesanan();


-- CREATE OR REPLACE FUNCTION update_stok_diterima() RETURNS TRIGGER AS $$
-- BEGIN
--     -- Hanya update jika nilai jumlah_diterima berubah
--     IF NEW.jumlah_diterima IS DISTINCT FROM OLD.jumlah_diterima THEN
--         -- Update stok pada tabel barang_medis
--         UPDATE barang_medis
--         SET stok = stok + (NEW.jumlah_diterima - OLD.jumlah_diterima)
--         WHERE id = NEW.id_barang_medis;
--     END IF;
--     RETURN NEW;
-- END;
-- $$ LANGUAGE plpgsql;

-- CREATE TRIGGER trigger_update_stok_diterima
-- AFTER UPDATE ON pesanan_barang_medis
-- FOR EACH ROW
-- EXECUTE FUNCTION update_stok_diterima();

-- CREATE OR REPLACE FUNCTION update_stok_keluar() RETURNS TRIGGER AS $$
-- BEGIN
--     -- Hanya update jika nilai jumlah_keluar berubah
--     IF NEW.jumlah_keluar IS DISTINCT FROM OLD.jumlah_keluar THEN
--         -- Update stok pada tabel barang_medis
--         UPDATE barang_medis
--         SET stok = stok - (NEW.jumlah_keluar - OLD.jumlah_keluar)
--         WHERE id = NEW.id_barang_medis;
--     END IF;
--     RETURN NEW;
-- END;
-- $$ LANGUAGE plpgsql;

-- CREATE TRIGGER trigger_update_stok_keluar
-- AFTER UPDATE ON transaksi_keluar_barang_medis
-- FOR EACH ROW
-- EXECUTE FUNCTION update_stok_keluar();

-- CREATE OR REPLACE FUNCTION insert_stok_diterima() RETURNS TRIGGER AS $$
-- BEGIN
--     -- Update stok pada tabel barang_medis hanya jika jumlah_diterima > 0
--     IF NEW.jumlah_diterima > 0 THEN
--         UPDATE barang_medis
--         SET stok = stok + NEW.jumlah_diterima
--         WHERE id = NEW.id_barang_medis;
--     END IF;
--     RETURN NEW;
-- END;
-- $$ LANGUAGE plpgsql;

-- CREATE TRIGGER trigger_insert_stok_diterima
-- AFTER INSERT ON pesanan_barang_medis
-- FOR EACH ROW
-- EXECUTE FUNCTION insert_stok_diterima();

-- CREATE OR REPLACE FUNCTION insert_stok_keluar() RETURNS TRIGGER AS $$
-- BEGIN
--     -- Update stok pada tabel barang_medis hanya jika jumlah_keluar > 0
--     IF NEW.jumlah_keluar > 0 THEN
--         UPDATE barang_medis
--         SET stok = stok - NEW.jumlah_keluar
--         WHERE id = NEW.id_barang_medis;
--     END IF;
--     RETURN NEW;
-- END;
-- $$ LANGUAGE plpgsql;

-- CREATE TRIGGER trigger_insert_stok_keluar
-- AFTER INSERT ON transaksi_keluar_barang_medis
-- FOR EACH ROW
-- EXECUTE FUNCTION insert_stok_keluar();

-- CREATE OR REPLACE FUNCTION soft_delete_update_stok_diterima() RETURNS TRIGGER AS $$
-- BEGIN
--     -- Hanya update stok jika kolom deleted_at berubah dari NULL menjadi tidak NULL
--     IF NEW.deleted_at IS NOT NULL AND OLD.deleted_at IS NULL THEN
--         -- Update stok pada tabel barang_medis
--         UPDATE barang_medis
--         SET stok = stok - OLD.jumlah_diterima
--         WHERE id = OLD.id_barang_medis;
--     END IF;
--     RETURN NEW;
-- END;
-- $$ LANGUAGE plpgsql;

-- CREATE TRIGGER trigger_soft_delete_stok_diterima
-- BEFORE UPDATE ON pesanan_barang_medis
-- FOR EACH ROW
-- EXECUTE FUNCTION soft_delete_update_stok_diterima();

-- CREATE OR REPLACE FUNCTION soft_delete_update_stok_keluar() RETURNS TRIGGER AS $$
-- BEGIN
--     -- Hanya update stok jika kolom deleted_at berubah dari NULL menjadi tidak NULL
--     IF NEW.deleted_at IS NOT NULL AND OLD.deleted_at IS NULL THEN
--         -- Update stok pada tabel barang_medis
--         UPDATE barang_medis
--         SET stok = stok + OLD.jumlah_keluar
--         WHERE id = OLD.id_barang_medis;
--     END IF;
--     RETURN NEW;
-- END;
-- $$ LANGUAGE plpgsql;

-- CREATE TRIGGER trigger_soft_delete_stok_keluar
-- BEFORE UPDATE ON transaksi_keluar_barang_medis
-- FOR EACH ROW
-- EXECUTE FUNCTION soft_delete_update_stok_keluar();
