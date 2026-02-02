package model

type GudangBarang struct {
	ID            string `json:"id"`              // UUID as string
	IDBarangMedis string `json:"id_barang_medis"` // e.g., B000001177
	IDRuangan     int    `json:"id_ruangan"`      // e.g., 1000
	Stok          int    `json:"stok"`            // e.g., 1000
	NoBatch       string `json:"no_batch"`        // e.g., BATCH001
	NoFaktur      string `json:"no_faktur"`       // e.g., FAKTUR001
}

type GudangBarangRequest struct {
	IDBarangMedis string `json:"id_barang_medis" validate:"required"`
	IDRuangan     int    `json:"id_ruangan" validate:"required"`
	Stok          int    `json:"stok" validate:"required"`
	NoBatch       string `json:"no_batch" validate:"required"`
	NoFaktur      string `json:"no_faktur" validate:"required"`
}

type GudangBarangResponse struct {
	ID            string `json:"id"`
	IDBarangMedis string `json:"id_barang_medis"`
	IDRuangan     int    `json:"id_ruangan"`
	Stok          int    `json:"stok"`
	NoBatch       string `json:"no_batch"`
	NoFaktur      string `json:"no_faktur"`
	Kapasitas     int    `json:"kapasitas"`
}

type GudangBarangPageResponse struct {
	Page         int                    `json:"page"`
	Size         int                    `json:"size"`
	Total        int                    `json:"total"`
	GudangBarang []GudangBarangResponse `json:"gudang_barang"`
}
