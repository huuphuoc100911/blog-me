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
});
