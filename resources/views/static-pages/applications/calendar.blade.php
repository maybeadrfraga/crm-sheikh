<x-app-layout>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <x-app.navbar />
            <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0"
                style="background-image: url('../../assets/img/header-blue-purple.jpg'); background-position: bottom;">
            </div>
            <div class="px-5 py-4 container-fluid">
                <div class="mt-6 row">
                    <div class="col-xl-12">
                        <div class="card blur card-calendar">
                            <div class="pb-0 card-header">
                                <h5 class="text-lg font-weight-semibold">Calendar</h5>
                                <p id="currentDate"><b>Loading...</b></p>
                            </div>
                            <div class="pt-0 card-body">
                                <div class="calendar" id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-app.footer />
            </div>
        </main>

        <!-- Modal -->
        <div class="modal fade" id="expenseModal" tabindex="-1" aria-labelledby="expenseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="expenseModalLabel">Expense Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Company Name:</strong> <span id="modalCompanyName"></span></p>
                        <p><strong>Description:</strong> <span id="modalDescription"></span></p>
                        <p><strong>Date:</strong> <span id="modalDate"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var dateElement = document.getElementById('currentDate');

            // Get today's date
            var today = new Date();
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var todayString = today.toLocaleDateString('en-US', options);

            // Update the date in the HTML
            dateElement.innerHTML = `<b>${todayString}</b>`;

            if (calendarEl) {
                fetch('/api/expenses')
                    .then(response => response.json())
                    .then(data => {
                        const events = data.map(expense => ({
                            id: expense.id, // Include an ID for identifying the event
                            title: expense.company.name + ' - ' + expense.description, // Name of the company and description
                            start: expense.date,
                            description: expense.description, // Description of the expense
                            companyName: expense.company.name, // Add the company name
                            className: 'p-1 mb-2 px-2 bg-info'
                        }));

                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            contentHeight: 'auto',
                            initialView: 'dayGridMonth', // Show the current month
                            headerToolbar: {
                                start: 'prev,next today', // Add navigation buttons
                                center: 'title',
                                end: ''
                            },
                            selectable: true,
                            editable: true,
                            events: events,
                            eventClick: function(info) {
                                var event = info.event;

                                // Populate the modal with event details
                                document.getElementById('modalCompanyName').textContent = event.extendedProps.companyName;
                                document.getElementById('modalDescription').textContent = event.extendedProps.description;
                                document.getElementById('modalDate').textContent = event.startStr;

                                // Show the modal
                                var expenseModal = new bootstrap.Modal(document.getElementById('expenseModal'));
                                expenseModal.show();
                            },
                            views: {
                                month: {
                                    titleFormat: {
                                        month: "long",
                                        year: "numeric"
                                    }
                                },
                                agendaWeek: {
                                    titleFormat: {
                                        month: "long",
                                        year: "numeric",
                                        day: "numeric"
                                    }
                                },
                                agendaDay: {
                                    titleFormat: {
                                        month: "short",
                                        year: "numeric",
                                        day: "numeric"
                                    }
                                }
                            },
                        });

                        calendar.render();
                    });
            }
        });
    </script>