$(document).ready(function() {
     // Alert sliding.
     $('div.alert').not('.alert-important').delay(5000).slideUp(300);

     // Hapus Select dengan empty value dari URL.
     $("#form-pencarian").submit(function() {
         $("#id_kelas option[value='']").attr("disabled","disabled");
         $("#jenis_kelamin option[value='']").attr("disabled","disabled");

        // Pastikan proses submit masih diteruskan.
        return true;
    });
});