@extends('admin.layouts.app')


@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách Câu Hỏi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home-admin') }}">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Danh sách câu hỏi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="coursesList">
                        {{-- nút thêm faq --}}
                        <a href="#addFaq" data-bs-toggle="modal" class="btn btn-secondary col-2"><i
                                class="bi bi-plus-circle align-baseline me-1"></i> Thêm câu hỏi</a>
                        {{-- end nút thêm faq --}}
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead class="text-muted">
                                        <tr>

                                            <th>ID</th>

                                            <th>Câu hỏi</th>

                                            <th>Câu trả lời</th>

                                            <th>Ngày tạo</th>

                                            <th>Ngày cập nhật</th>

                                            <th>Trạng thái</th>

                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($data as $item)
                                            <tr>


                                                <td><a href="" class="text-reset">{{ $item->id }}</a></td>

                                                <td>{{ $item->question }}</td>
                                                <td>{{ $item->answer }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>

                                                <td class="{{ $item->status_id == 1 ? 'text-success' : 'text-danger' }}">
                                                    {{ $item->status->status_name }}</td>
                                                <td>
                                                    <ul class="d-flex gap-2 list-unstyled mb-0">
                                                        <li>
                                                            <a href="apps-learning-overview.html"
                                                                class="btn btn-subtle-primary btn-icon btn-sm "><i
                                                                    class="ph-eye"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#addCourse{{ $item->id }}" data-bs-toggle="modal"
                                                                class="btn btn-subtle-secondary btn-icon btn-sm edit-item-btn"><i
                                                                    class="ph-pencil"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#deleteRecordModal"
                                                                data-id="{{ $item->id }}"
                                                                class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn"><i
                                                                    class="ph-trash"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                                <div class="noresult" style="display: none">
                                    <div class="text-center py-4">
                                        <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Courses We did not find
                                            any Courses for you search.</p>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
            @include('admin.faq.delete')
            @include('admin.faq.edit')
            @include('admin.faq.add')


        </div>
        <!-- container-fluid -->


    </div>
@endsection

@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection
@section('script-libs')
    <!--datatable js-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        $('#example').DataTable({
            language: {
                "sEmptyTable": "Không có dữ liệu trong bảng",
                "sInfo": "Hiển thị _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Hiển thị 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(đã lọc từ _MAX_ mục)",
                "sLengthMenu": "Hiển thị _MENU_ mục",
                "sLoadingRecords": "Đang tải...",
                "sProcessing": "Đang xử lý...",
                "sSearch": "Tìm kiếm:",
                "sZeroRecords": "Không tìm thấy kết quả nào",
                "oPaginate": {
                    "sFirst": "Đầu tiên",
                    "sLast": "Cuối cùng",
                    "sNext": "Tiếp theo",
                    "sPrevious": "Trước"
                },
                "oAria": {
                    "sSortAscending": ": kích hoạt để sắp xếp cột theo thứ tự tăng dần",
                    "sSortDescending": ": kích hoạt để sắp xếp cột theo thứ tự giảm dần"
                }
            }
        });
    </script>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // thêm faq
            $('#addFaqForm').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn submit mặc định của form

                // Xóa thông báo lỗi cũ
                $('#question-error').text('');
                $('#answer-error').text('');
                $('#status-error').text('');

                $.ajax({
                    url: "{{ route('faqs.store') }}", // URL action của form
                    type: 'POST',
                    data: $(this).serialize(), // Lấy dữ liệu từ form và bao gồm CSRF token
                    success: function(response) {
                        // Xử lý khi request thành công (có thể đóng modal, load lại danh sách FAQ)
                        // $('#addFaq').modal('hide');
                        // alert('Câu hỏi đã được thêm thành công!');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // Xử lý khi request bị lỗi
                        if (xhr.status === 422) { // Lỗi xác thực
                            let errors = xhr.responseJSON.errors;
                            if (errors.question) {
                                $('#question-error').text(errors.question[0]);
                            }
                            if (errors.answer) {
                                $('#answer-error').text(errors.answer[0]);
                            }
                            if (errors.status_id) {
                                $('#status-error').text(errors.status_id[0]);
                            }
                        } else {
                            console.log("Có lỗi xảy ra:", xhr.responseText);
                        }
                    }
                });
            });

            // xóa faq

            $('.remove-item-btn').on('click', function() {
                // Lấy ID của item cần xóa từ thuộc tính data-id
                const itemId = $(this).data('id');
                const url = "{{ route('faqs.destroy', ':id') }}"; // Tạo URL với placeholder :id
                const deleteUrl = url.replace(':id', itemId); // Thay thế :id bằng itemId
                $('#deleteForm').attr('action', deleteUrl); // Cập nhật action của form xóa 
            });
        });
    </script>
@endsection
