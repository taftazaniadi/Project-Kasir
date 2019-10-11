<?php
include "../lib/koneksi.php";
error_reporting(E_ALL ^ E_WARNING);
   $data = $_COOKIE['status'];
    if ($data=='hapus') {
        $id = $_COOKIE[idhapus];
        if (mysqli_query($query, "delete from staff where id_staff='$id'")) {
            unset($_COOKIE[$id]); ?>
                <script>
                    alert('Data berhasil dihapus..');
                    window.location.replace('Data_Karyawan');
                </script>
            <?php
        } else {
            ?>
            <script>
                alert('Data Gagal Dihapus..');
                window.location.replace('Data_Karyawan');
            </script>
            <?php
        }
    } elseif ($data=='insert') {
        $id = $_COOKIE[idstaff];
        $nama =$_COOKIE[namastaff];
        $user =$_COOKIE[userstaff];
        $pass =$_COOKIE[passstaff];
        $kontak =$_COOKIE[kontakstaff];
        $alamat =$_COOKIE[alamatstaff];
        $email =$_COOKIE[emailstaff];
        if (mysqli_query($query, "insert into staff values('$id','$nama','$user','$pass','$kontak','$alamat','$email')")) {
            unset($_COOKIE[idstaff]);
            unset($_COOKIE[namastaff]);
            unset($_COOKIE[userstaff]);
            unset($_COOKIE[passstaff]);
            unset($_COOKIE[kontakstaff]);
            unset($_COOKIE[alamatstaff]);
            unset($_COOKIE[emailstaff]); 
        ?>
            <script>
                alert('Data berhasil disimpan..');
            window.location.replace('Data_Karyawan');
            </script>
            <?php
        } else {
            ?>
            <script>
            alert('gagal');
            window.history.back();
            </script>
            <?php
        }
    } elseif ($data=='update') {
        $id = $_COOKIE[idstaff];
        $nama =$_COOKIE[namastaff];
        $user =$_COOKIE[userstaff];
        $pass =$_COOKIE[passstaff];
        $kontak =$_COOKIE[kontakstaff];
        $alamat =$_COOKIE[alamatstaff];
        $email =$_COOKIE[emailstaff];
        if (mysqli_query($query, "update staff set Nama='$nama', username='$user', password='$pass', contact='$kontak', alamat='$alamat', email='$email' where id_staff='$id'")) {
            unset($_COOKIE[idstaff]);
            unset($_COOKIE[namastaff]);
            unset($_COOKIE[userstaff]);
            unset($_COOKIE[passstaff]);
            unset($_COOKIE[kontakstaff]);
            unset($_COOKIE[alamatstaff]);
            unset($_COOKIE[emailstaff]); 
            ?>
                <script>
                    alert('berhasil staff');
                    window.location.replace('Data_Karyawan');
                </script>
                <?php
        } else {
            ?>
                <script>
                alert('gagal');
                window.history.back();
                </script>
                <?php
        }
    }
?>