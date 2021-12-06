

<body>

    <?php foreach ($port as $d) :?>
    
        <table>
        <input type="hidden" name="id_siswa" value="<?= $d['id_siswa'] ?>"/>
        <tr>
            <td><input type="text" name="username" value="<?= $d['username'] ?>"/></td>
        </tr>
        <tr>
            <td><input type="file" name="file" value="<?=$d['file'] ?>"></td>
        </tr>
        <tr>
            <td><textarea name="deskripsi" value=""><?= $d['deskripsi'] ?></textarea>  </td>
        </tr>
        


        </table>
    
    
    <?php endforeach; ?>
    



</body>
