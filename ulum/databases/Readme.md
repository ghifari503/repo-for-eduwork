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
```

![Alt text](images/1.png?raw=true "1")
<br/><br/>

```sql
2. SELECT * FROM obat WHERE harga_obat < 30000;
```

![Alt text](images/2.png?raw=true "2")
<br/><br/>

```sql
3. SELECT * FROM obat WHERE nama_obat LIKE '%Paracetamol%';
```

![Alt text](images/3.png?raw=true "3")
<br/><br/>

```sql
4. SELECT * FROM pembeli;
```

![Alt text](images/4.png?raw=true "4")
<br/><br/>

```sql
5. SELECT * FROM transaksi;
```

![Alt text](images/5.png?raw=true "5")
<br/><br/>

```sql
6. SELECT * FROM detail_transaksi;
```

![Alt text](images/6.png?raw=true "6")
<br/><br/>

```sql
7. SELECT * FROM transaksi ORDER BY tgl_transaksi ASC;
```

![Alt text](images/7.png?raw=true "7")
<br/><br/>

```sql
8. SELECT * FROM transaksi WHERE jumlah_transaksi < 20;
```

![Alt text](images/8.png?raw=true "8")
<br/><br/>

```sql
9. SELECT * FROM detail_transaksi WHERE total_kembalian = 0;
```

![Alt text](images/9.png?raw=true "9")
<br/><br/>

```sql
10. SELECT * FROM detail_transaksi WHERE total_harga >= 100000;
```

![Alt text](images/10.png?raw=true "10")

<br/><br/><br/><br/>

# 5 Query SQL with update and delete

```sql
1. DELETE FROM obat WHERE id_obat = 1;
2. DELETE FROM pembeli WHERE nama_pembeli LIKE '%an%';
3. DELETE FROM transaksi WHERE jumlah_transaksi < 10
4. UPDATE pembeli SET nama_pembeli = 'Suki' WHERE id_pembeli = 2;
5. UPDATE obat SET stok_obat = 200 WHERE nama_obat = 'Panadol';
```

<br/><br/><br/><br/>

# 5 Query Join SQL

```sql
    SELECT * FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi WHERE transaksi.jumlah_transaksi <= 5
```

![Alt text](images/11.png?raw=true "11")
<br/><br/>

```sql
    SELECT * FROM obat LEFT JOIN transaksi ON obat.id_obat = transaksi.id_obat WHERE transaksi.jumlah_transaksi IS NULL;
```

![Alt text](images/12.png?raw=true "12")
<br/><br/>

```sql
    SELECT * FROM pembeli RIGHT JOIN transaksi ON pembeli.id_pembeli = transaksi.id_transaksi ORDER BY transaksi.jumlah_transaksi ASC;
```

![Alt text](images/13.png?raw=true "13")
<br/><br/>

```sql
    SELECT obat.nama_obat , obat.stok_obat, obat.harga_obat, transaksi.tgl_transaksi, transaksi.jumlah_transaksi, (obat.harga_obat*transaksi.jumlah_transaksi) as total_harga FROM obat LEFT JOIN transaksi ON obat.id_obat = transaksi.id_obat WHERE nama_obat LIKE '%an%';
```

![Alt text](images/14n.png?raw=true "14")
<br/><br/>

```sql
    SELECT obat.nama_obat , obat.harga_obat, transaksi.tgl_transaksi, transaksi.jumlah_transaksi, (obat.harga_obat*transaksi.jumlah_transaksi) as total_harga FROM obat LEFT JOIN transaksi ON obat.id_obat = transaksi.id_obat WHERE (obat.harga_obat*transaksi.jumlah_transaksi) < 100000;
```

![Alt text](images/15.png?raw=true "15")
