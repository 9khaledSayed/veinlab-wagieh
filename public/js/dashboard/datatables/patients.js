"use strict";

// Class definition
let KTDatatable = function () {

    // Shared variables
    let table;
    let datatable;
    let filter;



    // Private functions
    let initDatatable = function () {
        datatable = $("#kt_datatable").DataTable({
            orderable: false,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[4, 'desc']], // display records number and ordering type
            stateSave: false,
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: {
                data: function () {
                    let datatable = $('#kt_datatable');
                    let info = datatable.DataTable().page.info();
                    datatable.DataTable().ajax.url(`/dashboard/patients?page=${info.page + 1}&per_page=${info.length}`);
                }
            },
            columns: [
                {data: 'id'},
                {data: 'name_ar'},
                {data: 'name_en'},
                {data: 'phone'},
                {data: 'id_number'},
                {data: 'email'},
                {data: 'gender'},
                {data: 'AllFinishedWaitingLab'},
                {data: 'AllPendingWaitingLab'},
                {data: 'AllWaitingLab'},
                {data: 'created_at'},
                {data: null},
            ],
            columnDefs: [

                {
                    targets: 7,
                    data: null,
                    render: function (data, type, row) {
                        if(data){
                            return `<a href="/dashboard/waiting-labs/finished?status=2&patient=${row.id}" style="color:#50cd89;"> ${data} </a>`;
                        }else{
                            return 0
                        }
                     },
                },

                {
                    targets: 8,
                    data: null,
                    render: function (data, type, row) {
                        if(data){
                            return `<a href="/dashboard/waiting-labs/pending?status=1&patient=${row.id}" style="color:#d2061e;">  ${data} </a>`;
                        }else{
                            return 0
                        }
                     },
                },


                {
                    targets: 9,
                    data: null,
                    render: function (data, type, row) {
                        if(data){
                            return `<a href="/dashboard/waiting-labs?patient=${row.id}" style="color:#5b0efa;"> ${data} </a>`;
                        }else{
                            return 0
                        }
                     },
                },


                {
                    targets: -6,
                    data: null,
                    render: function (data, type, row) {

                        if(row.gender === 'male') {
                            return `<span class="badge badge-light-success">${translate('Male')}</span>`;
                        } else if (row.gender === 'female') {
                            return `<span class="badge badge-light-danger">${translate('Female')}</span>`;
                        } else if(row.gender === 'child'){
                            return `<span class="badge badge-light-info">${translate('Child')}</span>`;
                        }
                    },
                },

                {
                    targets: -1,
                    data: null,
                    render: function (data, type, row) {
                        return `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                ${translate('Actions')}
                                <span class="svg-icon svg-icon-5 m-0">
                                    <i class="fa fa-angle-down mx-1"></i>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="/dashboard/patients/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                                       <span> ${translate('Edit')} </span>
                                       <span>  <i class="fa fa-edit text-primary"></i> </span>
                                    </a>

                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->

                                <div class="menu-item px-3">
                                    <a href="/dashboard/patients/${ row.id }" class="menu-link px-3 d-flex justify-content-between" >
                                       <span> ${translate('Show')} </span>
                                       <span>  <i class="fa fa-eye text-black-50"></i> </span>
                                    </a>

                                </div>

                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('patient')}">
                                        <span> ${translate('Delete')} </span>
                                        <span>  <i class="fa fa-trash text-danger"></i> </span>
                                    </a>
                                </div>
                                <!--end::Menu item-->

                            </div>
                            <!--end::Menu-->
                        `;
                    },
                },
            ],

        });

        table = datatable.$;

        datatable.on('draw', function () {
            handleDeleteRows();
            KTMenu.createInstances();
        });
    }

    // general search in datatable
    let handleSearchDatatable = () => {

        $('#general-search-inp').keyup( function () {
            datatable.search( $(this).val() ).draw();
        });

    }

    // Filter Datatable
    let handleFilterDatatable = () => {

        $('.filter-datatable-inp').each( (index , element) =>  {

            $(element).change( function () {

                let columnIndex = $(this).data('filter-index'); // index of the searching column

                datatable.column(columnIndex).search( $(this).val()).draw();
            });

        })
    }

    // Delete record
    let handleDeleteRows = () => {

        $('.delete-row').click(function () {

            let rowId = $(this).data('row-id');
            let type  = $(this).data('type');

            deleteAlert(type).then(function (result) {

                if (result.value) {

                    loadingAlert(translate('deleting now ...'));

                    $.ajax({
                        method: 'delete',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '/dashboard/patients/' + rowId,
                        success: () => {

                            setTimeout( () => {

                                successAlert(`${translate('You have deleted the') + ' ' + type + ' ' + translate('successfully !')} `)
                                    .then(function () {
                                        datatable.draw();
                                    });

                            } , 1000)



                        },
                        error: (err) => {

                            if (err.hasOwnProperty('responseJSON')) {
                                if (err.responseJSON.hasOwnProperty('message')) {
                                    errorAlert(err.responseJSON.message);
                                }
                            }
                        }
                    });


                } else if (result.dismiss === 'cancel') {

                    errorAlert( translate('was not deleted !') )

                }
            });
        })
    }




    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            // handleFilterDatatable();


        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatable.init();
});