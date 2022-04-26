@section('main-js')

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".hdtuto").remove();
            });
        });
    </script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#btn-success").click(function() {
                var lstedithmtl = $(".cloned").html();
                $("#increment").after(lstedithmtl);
            });
            $("body").on("click", "#btn-danger", function() {
                $(this).parents(".hded").remove();
            });
        });
    </script>

    

@endsection
