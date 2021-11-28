<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });  

        // Function call to load event display
        loadDates();

        // Ajax call to save event
        $('#saveEvent').on('click', function() {

            if (validate()) return;

            var form = document.getElementById('createEvent');
            var formData = new FormData(form);
            
            $.ajax({
                url: "{{ route('calendar.addEvent') }}",
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(data) {

                    // Serialize form
                    // Post to controller
                    // If success load events to display
                    swal({
                        title: "Success!",
                        text: 'Successfully saved event!',
                        icon: "success"
                    });

                    loadDates();
                },
                error: function(request, status, error) {
                    swal({
                        title: "Error!",
                        text: 'Failed to save event. Please contact administrator',
                        icon: "error"
                    });
                },
                contentType: false,
                processData: false,
                cache: false
            });
        });

        // Ajax call to load events from datatable
        function loadDates ()
        {
            $.ajax({
                url: "{{ route('calendar.getEvents') }}",
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(data) {

                    // If event does exist empty out the div
                    // Then display the events 
                    // Add style to day that falls in selected day of the week
                    // Then append to div display
                    var datesDiv = $('#dates');

                    if (data != null) {
                        datesDiv.empty();

                        $.each(data, function(key, val) {

                            var style = 'style="background-color: #2ad33726"';

                            var add = '<div class="row day"' + (val.is_event ? style : '') + '>' +
                                        '<div class="col-md-2">' +
                                            val.count + ' ' + val.day +
                                        '</div>' +
                                        '<div class="col-md-10">' +
                                            val.title +
                                        '</div>' +
                                    '</div>';

                            datesDiv.append(add);
                        })
                    }
                },
                error: function(request, status, error) {
                    console.log(error);
                },
                contentType: false,
                processData: false,
                cache: false
            });
        }

        // Validate form
        function validate ()
        {
            if (!$('#createEvent').parsley().validate() ) {
                return true;
            }
        }
    });
</script>