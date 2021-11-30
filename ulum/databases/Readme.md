# Relasi Database

## one to one

satu transaksi hanya mempunyai satu detail transaksi

## one to many

satu pembeli bisa punya banyak transaksi
satu obat bisa punya banyak transaksi

## many to many

beberapa obat bisa dibeli oleh beberapa pembeli
<br/><br/><br/><br/>

# 10 Query SQL

```sql
1. SELECT * FROM obat ORDER BY stok_obat ASC;
2. SELECT * FROM obat WHERE harga_obat < 30000;
3. SELECT * FROM obat WHERE nama_obat LIKE '%Paracetamol%';
4. SELECT * FROM pembeli;
5. SELECT * FROM transaksi;
6. SELECT * FROM detail_transaksi;
7. SELECT * FROM transaksi ORDER BY tgl_transaksi ASC;
8. SELECT * FROM transaksi WHERE jumlah_transaksi < 20;
9. SELECT * FROM detail_transaksi WHERE total_kembalian = 0;
10. SELECT * FROM detail_transaksi WHERE total_harga >= 100000;
```
