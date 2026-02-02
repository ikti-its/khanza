package config

import (
	"log"
	"time"

	"github.com/jmoiron/sqlx"
	_ "github.com/lib/pq"
)

func NewPostgres(cfg *Config) *sqlx.DB {
	var (
		dsn          = cfg.Get("DB_DSN", "postgres://user:password@localhost:5432/postgres")
		connOpen     = cfg.GetInt("DB_CONN_OPEN", 100)
		connIdle     = cfg.GetInt("DB_CONN_IDLE", 10)
		connLifeTime = cfg.GetInt("DB_CONN_LIFETIME", 15)
	)

	db, err := sqlx.Open("postgres", dsn)
	if err != nil {
		log.Fatalf("Failed to connect to database: %v", err)
	}

	db.SetMaxOpenConns(connOpen)
	db.SetMaxIdleConns(connIdle)
	db.SetConnMaxLifetime(time.Minute * time.Duration(connLifeTime))

	return db
}
