<div>
    <div>
        <div id='calendar-container' wire:ignore>
            <div id='calendar'></div>
        </div>
    </div>

    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
        <script>
            document.addEventListener('livewire:load', function() {
                var Calendar = FullCalendar.Calendar;
                var Draggable = FullCalendar.Draggable;
                var calendarEl = document.getElementById('calendar');
                var checkbox = document.getElementById('drop-remove');
                var data = @json($events); // Assuming $events contains the event data
                var calendar = new Calendar(calendarEl, {
                    events: data,
                    dateClick: function(info) {
                        var title = prompt('ادخل عنوان الحدث ');
                        var date = new Date(info.dateStr + 'T00:00:00');
                        //var id = @json(auth()->user()->id);
                      //  var type = @json(Auth::guard()->getName());
                        if (title != null && title != '') {
                            calendar.addEvent({
                                title: title,
                                start: date,
                                allDay: true,
                               // creator_id: id, 
                               // creator_type: type 
                            });
                            var eventAdd = { title: title, start: date };
                            Livewire.emit('addevent', eventAdd);
                            alert('تم اضافة الحدث بنجاح');
                        } else {
                            alert('من فضلك ادخل عنوان الحدث');
                        }
                    },
                    // Rest of your code...
                });
                calendar.render();

                Livewire.on('refreshCalendar', function() {
                    calendar.refetchEvents();
                });
            });
        </script>
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
    @endpush
</div>
