$(document).ready(function () {
    $(".delete-action").click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Bạn có chắc chắn?",
            text: "Nếu xóa bạn không thể khôi phục!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ok, đồng ý xóa!",
            cancelButtonText: "Hủy!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Xóa!",
                    text: "Xóa thành công.",
                    icon: "success",
                });
                var deleteForm = document.forms["delete-form"];
                deleteForm.action = e.target.href;
                deleteForm.submit();
            } else {
                // If cancelled
                Swal.fire("Cancelled", "Action cancelled.", "error");
            }
        });
    });

    function renderSlug(slug) {
        slug = slug.toLowerCase();
        slug = slug.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        slug = slug.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        slug = slug.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        slug = slug.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ/g, "o");
        slug = slug.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        slug = slug.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        slug = slug.replace(/đ/g, "d");
        //Xóa các ký tự đặt biệt
        slug = slug.replace(
            /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/g,
            ""
        );
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, "-");
        slug = slug.replace(/\-\-\-\-/gi, "-");
        slug = slug.replace(/\-\-\-/gi, "-");
        slug = slug.replace(/\-\-/gi, "-");
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = "@" + slug + "@";
        slug = slug.replace(/\@\-|\-\@|\@/gi, "");
        //In slug ra textbox có id “slug”
        document.getElementById("slug").value = slug;
        return slug;
    }

    const title = $(".slug-origin");
    const slug = $(".slug-render");
    let isChangeSlug = false;

    if (slug.val() === "") {
        title.keyup(function (e) {
            if (!isChangeSlug) {
                slug.val(renderSlug(e.target.value));
            }
        });
    }

    slug.change(function (e) {
        if (e.target.value === "") {
            slug.val(renderSlug(title.val()));
        }
        isChangeSlug = true;
    });

    // formatNumberInput = $(".format-number-input");
    // formatNumberInput.keyup(function (e) {
    //     formatNumberInput.val(formatMoneyInputValue(e.target.value));
    // });
});
