document.addEventListener('DOMContentLoaded', () => {
     var calendarEl = document.getElementById('calendar');
     var Next_year = document.getElementById('Year_array_next');
     var Prev_Year = document.getElementById('Year_array_prev');

     var calendar = new FullCalendar.Calendar(calendarEl, {
       plugins: [ 'dayGrid' ]
     });

     Prev_Year.addEventListener('click', () => {
       calendar.prevYear();
     })
     Next_year.addEventListener('click', () => {
      calendar.nextYear()
     })



    calendar.render();

    var data_parent = document.querySelector('.fc-view-container');

   });
