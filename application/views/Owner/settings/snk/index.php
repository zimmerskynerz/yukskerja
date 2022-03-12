<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Syarat dan Ketentuan YuksKerja.com</h4>
                            </div>
                        </div>
                    </div>
                    <?= $this->session->flashdata('berhasil_berubah'); ?>
                    <div class="widget-content widget-content-area" style="padding-bottom: 15px;">
                        <?php echo form_open_multipart('owner/settings/biaya/crud'); ?>
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                            value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="form-group">
                            <textarea id="content" class="form-control" name="isi_post"></textarea>
                        </div>
                        <button type="submit" id="simpanBiaya" name="simpanBiaya"
                            class="mt-4 btn btn-primary">Simpan</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="footer-wrapper">
    <div class="footer-section f-section-1">
        <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All
            rights reserved.</p>
    </div>
    <div class="footer-section f-section-2">
        <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-heart">
                <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
            </svg></p>
    </div>
</div>
</div>
<script>
setTimeout(function() {
    $('#berhasil_berubah').hide()
}, 3000);
</script>
<script src="https://cdn.tiny.cloud/1/6wl1abiyb8pin8f3dk5mnowk2kojs5qzxje6c0i2phfnhk37/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
var baseUrl = "<?= base_url() ?>";
tinymce.init({
    selector: '#content',
    relative_urls: false,
    remove_script_host: false,
    document_base_url: "<?= base_url() ?>",
    height: 600,
    plugins: ["advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
    ],
    toolbar: [
        "styleselect | bold italic alignleft aligncenter alignright alignjustify bullist numlist outdent indent link image",
        "fontsizeselect | strikethrough forecolor backcolor removeformat pagebreak table | undo redo | fullscreen code"
    ],
    menubar: false,
    image_title: true,
    automatic_uploads: true,
    file_picker_types: 'image',
    images_upload_handler: function(blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '<?= base_url('administrator/berita/upload_img') ?>');
        xhr.setRequestHeader("<?= csrf_name() ?>", "<?= csrf_token() ?>");
        xhr.onload = function() {
            var json;
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
            success(json.location);
        };
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    }
});

$(document).ready(function() {
    $('#judul').on('keyup', function() {
        var link = $(this).val();
        var permalink = "";
        link = link.replace(/&/g, ' dan ');
        link = link.replace(/\//g, ' atau ');
        link = link.replace(/\W+(?!$)/g, '-').toLowerCase();
        link = link.replace(/\W$/, '').toLowerCase();
        permalink = link;
        link = link.length > 20 ? link.substring(0, 25) + '...' + link.substring(link.length, link
            .length - 10) : link;
        link = baseUrl + link;
        $('#sunting_ok').on('click', function() {
            $('#judul').off('keyup');
        });
        if ($(this).val().length > 0) {
            $('.permalink-group').removeClass('d-none');
            $('#thisPermalink').html(link);
            $('#permalink').val(permalink);
        } else {
            $('.permalink-group').addClass('d-none');
        }

    });
    $('#sunting_batal').on('click', function() {
        $('#thisPermalink').html(baseUrl + $('#thisPermalink').text().split('/').slice(-1)[0]);
        $('#permalink').val($('#thisPermalink').text().split('/').slice(-1)[0]);
        $('#thisPermalink, #sunting').removeClass('d-none');
        $('#baseurl, #permalink, #sunting_ok, #sunting_batal').addClass('d-none');
    });
    $('#sunting').on('click', function() {
        $('#thisPermalink, #sunting').addClass('d-none');
        $('#baseurl, #permalink, #sunting_ok, #sunting_batal').removeClass('d-none');
        $('#baseurl').html(baseUrl);
    });
    $('#permalink').on('keyup', function() {
        var link = $(this).val();
        link = link.replace(/&/g, 'dan');
        link = link.replace(/\//g, 'atau');
        link = link.replace(/\W+/g, '-');
        link = link.replace(/\W+(?!$)/g, '-').toLowerCase();
        $(this).val(link);
    });
    $('#sunting_ok').on('click', function() {
        if ($('#permalink').val().length > 0) {
            $('#thisPermalink, #sunting').removeClass('d-none');
            $('#baseurl, #permalink, #sunting_ok, #sunting_batal').addClass('d-none');
            $('#thisPermalink').html(baseUrl + $('#permalink').val());
        } else {
            return false;
        }
    });
});
</script>