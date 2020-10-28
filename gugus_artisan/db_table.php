<?php

require_once 'table_opsi_set.php';

function crdb()
{
    $arr = array(
        array(
            "table" => "login",
            "data" => array(
                "id" => ai(11),
                "username" => char(255),
                "password" => textlong(),
                "sebagai" => char(255),
                "email" => char(255),
                "telp" => char(255),
                "status" => char(255)
            )
        ),
        array(
            "table" => "category",
            "data" => array(
                "id" => ai(11),
                "nama_kategori" => char(255),
                "login_id" => char(11),
            )
        ),
        array(
            "table" => "kota",
            "data" => array(
                "id" => ai(11),
                "nama_kota" => char(255)
            )
        ),
        array(
            "table" => "provinsi",
            "data" => array(
                "id" => ai(11),
                "nama_provinsi" => char(255)
            )
        ),
        array(
            "table" => "brand",
            "data" => array(
                "id" => ai(11),
                "nama_brand" => char(255),
                "login_id" => char(255)
            )
        ),
        array(
            "table" => "supplier",
            "data" => array(
                "id" => ai(11),
                "nama_supplier" => char(255),
                "alamat" => char(255),
                "no_telp" => char(255),
                "login_id" => char(255)
            )
        ),
        array(
            "table" => "product",
            "data" => array(
                "id" => ai(11),
                "nama_product" => char(255),
                "brand_id" => char(255),
                "category_id" => char(255),
                "model_year" => char(255),
                "login_id" => char(255)
            )
        ),
        array(
            "table" => "foto_product",
            "data" => array(
                "id" => ai(11),
                "product_id" => char(255),
                "foto" => text(),
                "login_id" => char(255)
            )
        ),
        array(
            "table" => "video_product",
            "data" => array(
                "id" => ai(11),
                "product_id" => char(255),
                "video" => char(255),
                "login_id" => char(255)
            )
        ),
        array(
            "table" => "harga_jual",
            "data" => array(
                "id" => ai(11),
                "product_id" => char(255),
                "harga_item" => char(255),
                "login_id" => char(255)
            )
        ),
        array(
            "table" => "pembelian",
            "data" => array(
                "id" => ai(11),
                "product_id" => char(255),
                "supplier_id" => char(255),
                "tanggal" => char(255),
                "qty" => char(255),
                "harga_satuan" => char(255),
                "harga_total" => char(255),
                "login_id" => char(255)
            )
        ),
        array(
            "table" => "chat",
            "data" => array(
                "id" => ai(11),
                "pesan" => char(255),
                "customer_id" => char(255),
                "login_id" => char(255)
            )
        ),
        array(
            "table" => "customer",
            "data" => array(
                "id" => ai(11),
                "nama" => char(255),
                "no_telp" => char(255),
                "email" => char(255),
                "alamat" => text(),
                "kota_id" => char(255),
                "provinsi_id" => char(255),
                "username" => char(255),
                "password" => text(255)
            )
        ),
        array(
            "table" => "order_barang",
            "data" => array(
                "id" => ai(11),
                "customer_id" => char(255),
                "product_id" => char(255),
                "tanggal" => char(255),
                "qty" => char(255)
            )
        ),
        array(
            "table" => "slider",
            "data" => array(
                "id" => ai(11),
                "foto" => char(255),
                "title" => char(255),
                "keterangan" => char(255),
            )
        )
    );
    return $arr;
}
