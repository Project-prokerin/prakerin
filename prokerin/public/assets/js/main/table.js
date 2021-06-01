$(document).ready(function () {
    $('#table-1').dataTable({
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>t<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>"
    });
    $("div#mydropzone").dropzone({ url: "/file/post" });
});
