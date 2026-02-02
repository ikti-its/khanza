package config

import (
	"log"
	"os"
	"strconv"
)

type Config struct {
}

func NewConfig() *Config {
	return &Config{}
}

func (c *Config) Get(key, def string) string {
	if value, ok := os.LookupEnv(key); ok {
		return value
	}

	log.Printf("Failed to get %s, using default value: %s", key, def)
	return def
}

func (c *Config) GetInt(key string, def int) int {
	value, err := strconv.Atoi(os.Getenv(key))
	if err != nil {
		log.Printf("Failed to parse %s to int, using default value: %d", key, def)
		return def
	}
	return value
}

func (c *Config) GetBool(key string, def bool) bool {
	value, err := strconv.ParseBool(os.Getenv(key))
	if err != nil {
		log.Printf("Failed to parse %s to bool, using default value: %t", key, def)
		return def
	}
	return value
}

func (c *Config) GetString(key string, def string) string {
	value := os.Getenv(key)
	return value
}
