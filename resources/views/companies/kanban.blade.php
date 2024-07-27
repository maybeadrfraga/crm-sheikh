<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0"
            style="background-image: url('../../assets/img/header-blue-purple.jpg'); background-position: bottom;">
        </div>
        <div class="px-5 py-4 container-fluid">
            <div class="d-flex justify-content-between mb-4">
                <select id="company-select" class="form-select">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-5 kanban-container">
                <div class="py-2 min-vh-100 w-100 d-inline-flex" style="overflow-x: auto">
                    <div id="myKanban"></div>
                </div>
            </div>
            <div class="m-3 d-flex">
                <div class="d-flex">
                    <div class="mt-1 pe-4 position-relative">
                        <p class="mb-2 text-xs text-secondary font-weight-bold">Team members:</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="avatar-group">
                                <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-toggle="tooltip"
                                    data-original-title="Jessica Rowland">
                                    <img alt="Image placeholder" src="../../assets/img/team-1.jpg">
                                </a>
                                <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-toggle="tooltip"
                                    data-original-title="Audrey Love">
                                    <img alt="Image placeholder" src="../../assets/img/team-2.jpg"
                                        class="rounded-circle">
                                </a>
                                <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-toggle="tooltip"
                                    data-original-title="Michael Lewis">
                                    <img alt="Image placeholder" src="../../assets/img/team-3.jpg"
                                        class="rounded-circle">
                                </a>
                                <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-toggle="tooltip"
                                    data-original-title="Lucia Linda">
                                    <img alt="Image placeholder" src="../../assets/img/team-4.jpg"
                                        class="rounded-circle">
                                </a>
                                <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-toggle="tooltip"
                                    data-original-title="Ronald Miller">
                                    <img alt="Image placeholder" src="../../assets/img/team-5.jpg"
                                        class="rounded-circle">
                                </a>
                            </div>
                        </div>
                        <hr class="mt-0 vertical dark">
                    </div>
                    <div class="ps-4">
                        <button class="mt-3 mb-0 btn btn-white btn-icon-only" data-toggle="modal"
                            data-target="#new-board-modal">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="new-board-modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="h5 modal-title">Choose your new Board Name</h5>
                            <button type="button" class="btn close pe-1" data-dismiss="modal"
                                data-target="#new-board-modal" aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="pt-4 modal-body">
                            <div class="mb-4 input-group">
                                <span class="input-group-text">
                                    <i class="far fa-edit"></i>
                                </span>
                                <input class="form-control" placeholder="Board Name" type="text"
                                    id="jkanban-new-board-name" />
                            </div>
                            <div class="text-end">
                                <button class="m-1 btn btn-primary" id="jkanban-add-new-board" data-toggle="modal"
                                    data-target="#new-board-modal">
                                    Save changes
                                </button>
                                <button class="m-1 btn btn-secondary" data-dismiss="modal"
                                    data-target="#new-board-modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed inset-0 z-40 hidden bg-black opacity-50" id="new-board-modal-backdrop"></div>
            <div class="modal fade" id="jkanban-info-modal" style="display: none" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="h5 modal-title">Task details</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="pt-4 modal-body">
                            <input id="jkanban-task-id" class="d-none" />
                            <div class="mb-4 input-group">
                                <span class="input-group-text">
                                    <i class="far fa-edit"></i>
                                </span>
                                <input class="form-control" placeholder="Task Title" type="text"
                                    id="jkanban-task-title" />
                            </div>
                            <div class="mb-4 input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input class="form-control" placeholder="Task Assignee" type="text"
                                    id="jkanban-task-assignee" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Task Description"
                                    id="jkanban-task-description" rows="4"></textarea>
                            </div>
                            <div class="alert alert-success d-none">Changes saved!</div>
                            <div class="text-end">
                                <button class="m-1 btn btn-primary" id="jkanban-update-task" data-toggle="modal"
                                    data-target="#jkanban-info-modal">
                                    Save changes
                                </button>
                                <button class="m-1 btn btn-secondary" data-dismiss="modal"
                                    data-target="#jkanban-info-modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed inset-0 z-40 hidden bg-black opacity-50" id="jkanban-info-modal-backdrop"></div>
            <x-app.footer />
        </div>
    </main>

</x-app-layout>
<script>
    // jkanban init

    (function () {
        if (document.getElementById("myKanban")) {
            document.addEventListener('DOMContentLoaded', function() {
    const companySelect = document.getElementById('company-select');

    function loadKanban(companyId) {
        fetch(`/kanban/${companyId}`)
            .then(response => response.json())
            .then(data => {
                var KanbanTest = new jKanban({
                    element: "#myKanban",
                    gutter: "10px",
                    widthBoard: "450px",
                    click: el => {
                        let jkanbanInfoModal = document.getElementById("jkanban-info-modal");

                        let jkanbanInfoModalTaskId = document.querySelector(
                            "#jkanban-info-modal #jkanban-task-id"
                        );
                        let jkanbanInfoModalTaskTitle = document.querySelector(
                            "#jkanban-info-modal #jkanban-task-title"
                        );
                        let jkanbanInfoModalTaskAssignee = document.querySelector(
                            "#jkanban-info-modal #jkanban-task-assignee"
                        );
                        let jkanbanInfoModalTaskDescription = document.querySelector(
                            "#jkanban-info-modal #jkanban-task-description"
                        );
                        let taskId = el.getAttribute("data-eid");

                        let taskTitle = el.querySelector('p.text').innerHTML;
                        let taskAssignee = el.getAttribute("data-assignee");
                        let taskDescription = el.getAttribute("data-description");
                        jkanbanInfoModalTaskId.value = taskId;
                        jkanbanInfoModalTaskTitle.value = taskTitle;
                        jkanbanInfoModalTaskAssignee.value = taskAssignee;
                        jkanbanInfoModalTaskDescription.value = taskDescription;
                        var myModal = new bootstrap.Modal(jkanbanInfoModal, {
                            show: true
                        });
                        myModal.show();
                    },
                    buttonClick: function(el, boardId) {
                        if (
                            document.querySelector("[data-id='" + boardId + "'] .itemform") ===
                            null
                        ) {
                            var formItem = document.createElement("form");
                            formItem.setAttribute("class", "itemform");
                            formItem.innerHTML = `<div class="form-group">
              <textarea class="form-control" rows="2" autofocus></textarea>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn bg-gradient-success btn-sm pull-end">Add</button>
                  <button type="button" id="kanban-cancel-item" class="btn bg-gradient-light btn-sm pull-end me-2">Cancel</button>
              </div>`;

                            KanbanTest.addForm(boardId, formItem);
                            formItem.addEventListener("submit", function(e) {
                                e.preventDefault();
                                var text = e.target[0].value;
                                let newTaskId =
                                    "_" + text.toLowerCase().replace(/ /g, "_") + boardId;
                                KanbanTest.addElement(boardId, {
                                    id: newTaskId,
                                    title: text,
                                    class: ["border-radius-md"]
                                });
                                formItem.parentNode.removeChild(formItem);
                            });
                            document.getElementById("kanban-cancel-item").onclick = function() {
                                formItem.parentNode.removeChild(formItem);
                            };
                        }
                    },
                    addItemButton: true,
                    boards: data.boards
                });
            });
    }

    companySelect.addEventListener('change', function() {
        const companyId = this.value;
        loadKanban(companyId);
    });

    // Carregar o Kanban para a empresa selecionada inicialmente
    loadKanban(companySelect.value);
});

        }
    })();
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>