@section('autocompleteJs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/3.1.1/bootstrap3-typeahead.min.js"
        integrity="sha512-HMvs0tUT7a7ND6nLto4fmkpx6F/ZE142Khe9r1QdY0Cp3g4yiAMYwM4wFKlg9ek4ZZRXvbw3lSRmG1si8cMHUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="text/javascript">
        var path1 = "{{ route('MasterPosition.autocompletePosition') }}";
        $('input.position').typeahead({
            source: function(query, process) {
                return $.get(path1, {
                    terms: query
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>

    <script type="text/javascript">
        var path2 = "{{ route('MasterType.autocompleteType') }}";
        $('input.type').typeahead({
            source: function(query, process) {
                return $.get(path2, {
                    terms: query
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>
    
    
@endsection
