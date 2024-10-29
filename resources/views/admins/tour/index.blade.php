@extends('admin.layouts.app')

@section('style')
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tour</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Courses</a></li>
                                <li class="breadcrumb-item active">List View</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="coursesList">
                        <div class="card-body">
                            <div class="row align-items-center g-2">
                                <div class="col-lg-3 me-auto">
                                    <h6 class="card-title mb-0">Instructors List <span
                                            class="badge bg-primary ms-1 align-baseline">9999</span></h6>
                                </div><!--end col-->
                                <div class="col-lg-2">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for courses, price or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-auto">
                                    <div class="hstack flex-wrap gap-2">
                                        <button class="btn btn-subtle-danger d-none" id="remove-actions"
                                            onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                        <a href="#addCourse2" data-bs-toggle="modal" class="btn btn-secondary"><i
                                                class="bi bi-plus-circle align-baseline me-1"></i> Add Course</a>
                                        <div>
                                            <button type="button" class="btn btn-info" data-bs-toggle="offcanvas"
                                                data-bs-target="#courseFilters" aria-controls="courseFilters"><i
                                                    class="bi bi-funnel align-baseline me-1"></i> Filter</button>
                                            <a href="apps-learning-grid.html" class="btn btn-subtle-primary btn-icon"><i
                                                    class="bi bi-grid"></i></a>
                                            <a href="apps-learning-list.html"
                                                class="btn btn-subtle-primary active btn-icon"><i
                                                    class="bi bi-list-task"></i></a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-centered align-middle table-custom-effect table-nowrap mb-0">
                                    <thead class="text-muted">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="option"
                                                        id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="category">Name</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="course_Name">Image
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="instructor">title</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="lessons">journeys</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="lessons">schedule</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="duration">move_method</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="students">starting_gate</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="fees">start_date</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="fees">end_date</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">number_guests</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">price_old</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">price_children</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">sale</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">view</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">description</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">content</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">location_id</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">user_id</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">album_img</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($listtour as $index => $item)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td class="id d-none"><a href="javascript:void(0)"
                                                        class="fw-medium link-primary">#TBS001</a></td>
                                                <td class="category"><a href="apps-learning-grid.html"
                                                        class="text-reset">{{ $item->name }}</a></td>
                                                <td class="course_Name">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ Storage::url($item->image) }}" alt=""
                                                                class="avatar-xxs">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="apps-learning-overview.html" class="text-reset"></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="instructor">{{ $item->title }}</td>
                                                <td class="lessons">{{ $item->journeys }}</td>
                                                <td class="lessons">{{ $item->schedule }}</td>
                                                <td class="duration">{{ $item->move_method }}</td>
                                                <td class="students">{{ $item->starting_gate }}</td>
                                                <td class="students">{{ $item->start_date }}</td>
                                                <td class="students">{{ $item->end_date }}</td>
                                                <td class="students">{{ $item->number_guests }}</td>
                                                <td class="students">{{ $item->price_old }}</td>
                                                <td class="students">{{ $item->price_children }}</td>
                                                <td class="students">{{ $item->sale }}</td>
                                                <td class="students">{{ $item->view }}</td>
                                                <td class="students">{{ $item->description }}</td>
                                                <td class="students">{{ $item->content }}</td>
                                                <td class="students">{{ $item->location->name }}</td>
                                                <td class="students">{{ $item->user->name }}</td>
                                                <td class="students">{{ $item->album_img }}</td>
                                                <td class="{{ $item->status == 1 ? 'text-success' : 'text-danger' }}">
                                                    {{ $item->status == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
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
                      <a href="#deleteRecordModal{{ $item->id }}" data-bs-toggle="modal" class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn"><i class="ph-trash"></i></a>
                                                    </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                             <!-- Xóa User -->
        <div id="deleteRecordModal{{ $item->id }}" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body p-md-5">
                      <div class="text-center">
                          <div class="text-danger">
                              <i class="bi bi-trash display-5"></i>
                          </div>
                          <div class="mt-4">
                              <h4 class="mb-2">Are you sure ?</h4>
                              <p class="text-muted mx-3 mb-0">Are you sure you want to remove this record ?</p>
                          </div>
                      </div>
                      <div class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                        <form action="{{ route('tour.destroy', $item->id) }}"
                          method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn w-sm btn-light btn-hover" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn w-sm btn-danger btn-hover" id="delete-record">Yes, Delete It!</button>
                        </form>
                      </div>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div>
 <!-- Sửa User -->
 <div class="modal fade" id="addCourse{{ $item->id }}" tabindex="-1" aria-labelledby="addCourseModalLabel"
 aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content border-0">
         <div class="modal-header bg-danger p-3">
             <h5 class="modal-title text-white" id="addCourseModalLabel">Sửa User</h5>
             <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                 aria-label="Close" id="close-addCourseModal"></button>
         </div>

         <form action="{{ route('tour.update',$item->id) }}" method="post" enctype="multipart/form-data"
             class="tablelist-form" novalidate autocomplete="off">
             @csrf
             @method('PUT')
             <div class="modal-body">
                <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                <input type="hidden" id="id-field">

                <input type="hidden" id="rating-field">
                <div class="mb-3">
                    <label for="image" class="form-label">Hình Ảnh</label>

                    <input type="file" id="image" name="image" class="form-control"
                        onchange="showImage(event)">
                    <img id="img_danh_muc" src="" alt="Hình Ảnh Sản Phẩm"
                        style="width: 150px;display:none">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Tên Tour<span
                            class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control"
                    value="{{$item->name}}" placeholder="Enter course title" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu Đề<span
                            class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" class="form-control"
                    value="{{$item->title}}"  placeholder="Enter course title" required>
                </div>
                <div class="mb-3">
                    <label for="journeys" class="form-label">Hành Trình<span
                            class="text-danger">*</span></label>
                    <input type="text" id="journeys" name="journeys" class="form-control"
                    value="{{$item->journeys}}"  placeholder="Enter course title" required>
                </div>
                <div class="mb-3">
                    <label for="schedule" class="form-label">Lịch trình<span
                            class="text-danger">*</span></label>
                    <input type="text" id="schedule" name="schedule" class="form-control"
                    value="{{$item->schedule}}"  placeholder="Enter course title" required>
                </div>
                <div class="mb-3">
                    <label for="move_method" class="form-label">Phương Tiện Di Chuyển<span
                            class="text-danger">*</span></label>
                    <input type="text" id="move_method" name="move_method" class="form-control"
                    value="{{$item->move_method}}"  placeholder="Enter course title" required>
                </div>
                <div class="mb-3">
                    <label for="starting_gate" class="form-label">Cổng khởi hành<span
                            class="text-danger">*</span></label>
                    <input type="text" id="starting_gate" name="starting_gate" class="form-control"
                    value="{{$item->starting_gate}}"  placeholder="Enter course title" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="description">Mô tả ngắn</label>
                    <textarea class="form-control" placeholder="Enter Description" id="description" name="description" rows="2">{{ $item->description }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="content">Nội dung chi tiết</label>
                    <textarea class="form-control" placeholder="Enter Description" id="content"name="content" rows="6">{{ $item->description }}</textarea>
                </div>




                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Ngày Bắt Đầu<span
                                    class="text-danger">*</span></label>
                            <input type="datetime-local" id="start_date" name="start_date" class="form-control"
                            value="{{$item->start_date}}"    placeholder="Enter instructor name" required>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Ngày Kết Thúc<span
                                    class="text-danger">*</span></label>
                            <input type="datetime-local" id="end_date" name="end_date" class="form-control"
                            value="{{$item->end_date}}"   placeholder="Lessons" required>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="price_old" class="form-label">Giá cũ<span
                                    class="text-danger">*</span></label>
                            <input type="number" id="price_old" name="price_old" class="form-control"
                            value="{{$item->price_old}}"  placeholder="Enter instructor name" required>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="price_children" class="form-label">Giá trẻ em<span
                                    class="text-danger">*</span></label>
                            <input type="number" id="price_children" name="price_children" class="form-control"
                            value="{{$item->price_children}}"  placeholder="Enter instructor name"  required>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="sale" class="form-label">Giảm Giá<span
                                    class="text-danger">*</span></label>
                            <input type="number" id="sale" name="sale" class="form-control"
                            value="{{$item->sale}}"  placeholder="Enter instructor name"  required>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="number_guests" class="form-label">Số lượng khách tối đa<span
                                    class="text-danger">*</span></label>
                            <input type="number" id="number_guests" name="number_guests" class="form-control"
                            value="{{$item->number_guests}}"  placeholder="Lessons" required>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="location_id" class="form-label">Gender<span
                                    class="text-danger">*</span></label>
                                    <select name="location_id"  class="form-select" >
                                        <option selected>Chọn Địa Điểm</option>
                                        @foreach ($listlocation as $itemn)
                                            <option value="{{$itemn->id}}" {{  $item->location_id == $itemn->id ? 'selected' : ''}}>{{$itemn->name}}</option>

                                            @endforeach
                                        
                                       </select>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Gender<span
                                    class="text-danger">*</span></label>
                                    <select name="user_id"  class="form-select" >
                                        <option selected>Người Thêm</option>
                                        @foreach ($listuser as $itemn)
                                            <option value="{{$itemn->id}}" {{  $item->user_id == $itemn->id ? 'selected' : ''}}>{{$itemn->name}}</option>

                                            @endforeach
                                        
                                       </select>
                        </div>
                    </div><!--end col-->
                   
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="1" {{  $item->status == 1 ? 'selected' : '' }} >Hiển Thị</option>
                                <option value="0" {{  $item->status == 0 ? 'selected' : '' }} >Ẩn</option>
                            </select>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
             <div class="modal-footer">
                 <div class="hstack gap-2 justify-content-end">
                     <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i
                             class="bi bi-x-lg align-baseline me-1"></i> Close</button>
                     <button type="submit" class="btn btn-primary" id="add-btn">Add Course</button>
                 </div>
             </div>
         </form>
     </div>
     <!-- modal-content -->
 </div>
</div>
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
                            <div class="row align-items-center mt-4 pt-2" id="pagination-element">
                                <div class="col-sm">
                                    <div class="text-muted text-center text-sm-start">
                                        Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">15</span>
                                        Results
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination-wrap hstack gap-2 justify-content-center">
                                        <a class="page-item pagination-prev disabled" href="javascript:void(0)">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="javascript:void(0)">
                                            Next
                                        </a>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
            <!-- Thêm User -->
            <div class="modal fade" id="addCourse2" tabindex="-1" aria-labelledby="addCourseModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-danger p-3">
                            <h5 class="modal-title text-white" id="addCourseModalLabel">Thêm User</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close" id="close-addCourseModal"></button>
                        </div>

                        <form action="{{ route('tour.store') }}" method="post" enctype="multipart/form-data"
                            class="tablelist-form" novalidate autocomplete="off">
                            @csrf
                            <div class="modal-body">
                                <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                                <input type="hidden" id="id-field">

                                <input type="hidden" id="rating-field">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Hình Ảnh</label>

                                    <input type="file" id="image" name="image" class="form-control"
                                        onchange="showImage(event)">
                                    <img id="img_danh_muc" src="" alt="Hình Ảnh Sản Phẩm"
                                        style="width: 150px;display:none">
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên Tour<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter course title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Tiêu Đề<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        placeholder="Enter course title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="journeys" class="form-label">Hành Trình<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="journeys" name="journeys" class="form-control"
                                        placeholder="Enter course title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="schedule" class="form-label">Lịch trình<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="schedule" name="schedule" class="form-control"
                                        placeholder="Enter course title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="move_method" class="form-label">Phương Tiện Di Chuyển<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="move_method" name="move_method" class="form-control"
                                        placeholder="Enter course title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="starting_gate" class="form-label">Cổng khởi hành<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="starting_gate" name="starting_gate" class="form-control"
                                        placeholder="Enter course title" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="description">Mô tả ngắn</label>
                                    <textarea class="form-control" placeholder="Enter Description" id="description" name="description" rows="2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="content">Nội dung chi tiết</label>
                                    <textarea class="form-control" placeholder="Enter Description" id="content"name="content" rows="6"></textarea>
                                </div>




                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">Ngày Bắt Đầu<span
                                                    class="text-danger">*</span></label>
                                            <input type="datetime-local" id="start_date" name="start_date" class="form-control"
                                                placeholder="Enter instructor name" required>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label">Ngày Kết Thúc<span
                                                    class="text-danger">*</span></label>
                                            <input type="datetime-local" id="end_date" name="end_date" class="form-control"
                                                placeholder="Lessons" required>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="price_old" class="form-label">Giá cũ<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="price_old" name="price_old" class="form-control"
                                                placeholder="Enter instructor name" required>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="price_children" class="form-label">Giá trẻ em<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="price_children" name="price_children" class="form-control"
                                                placeholder="Enter instructor name"  required>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="sale" class="form-label">Giảm Giá<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="sale" name="sale" class="form-control"
                                                placeholder="Enter instructor name"  required>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="number_guests" class="form-label">Số lượng khách tối đa<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="number_guests" name="number_guests" class="form-control"
                                                placeholder="Lessons" required>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="location_id" class="form-label">Gender<span
                                                    class="text-danger">*</span></label>
                                                    <select name="location_id"  class="form-select @error('location_id') is-invalid @enderror" >
                                                        <option selected>Chọn Địa Điểm</option>
                                                        @foreach ($listlocation as $item)
                                                        <option value="{{$item->id}}" {{ old('location_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
            
                                                        @endforeach
                                                        
                                                       </select>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">Gender<span
                                                    class="text-danger">*</span></label>
                                                    <select name="user_id"  class="form-select @error('user_id') is-invalid @enderror" >
                                                        <option selected>Người Thêm</option>
                                                        @foreach ($listuser as $item)
                                                        <option value="{{$item->id}}" {{ old('user_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
            
                                                        @endforeach
                                                        
                                                       </select>
                                        </div>
                                    </div><!--end col-->
                                   
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="">Select Status</option>
                                                <option value="1" >Hiển Thị</option>
                                                <option value="0" >Ẩn</option>
                                            </select>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i
                                            class="bi bi-x-lg align-baseline me-1"></i> Close</button>
                                    <button type="submit" class="btn btn-primary" id="add-btn">Add Course</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- modal-content -->
                </div>
            </div>
           
            
        </div>
        <!-- container-fluid -->


    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
  $('#deleteRecordModal').on('submit', function(e) {
    e.preventDefault();  // Ngăn form gửi dữ liệu theo cách truyền thống

    $.ajax({
      url: '/add-product',  // Đường dẫn đến route thêm sản phẩm
      method: 'POST',
      data: $(this).serialize(),  // Lấy tất cả dữ liệu từ form
      success: function(response) {
        // Xử lý khi thành công
        $('#message').html('<p>Sản phẩm đã được thêm thành công!</p>');
        // Cập nhật danh sách sản phẩm mà không cần reload trang
      },
      error: function(xhr) {
        // Xử lý lỗi
        $('#message').html('<p>Có lỗi xảy ra!</p>');
      }
    });
  });
});

</script>
<script>
    $('#addCourse2').on('submit', function(e) {
  e.preventDefault();

  $.ajax({
    url: '/edit-product',  // Route sửa sản phẩm
    method: 'POST',
    data: $(this).serialize(),
    success: function(response) {
      $('#editMessage').html('<p>Sản phẩm đã được sửa thành công!</p>');
      // Cập nhật danh sách sản phẩm mới
    },
    error: function(xhr) {
      $('#editMessage').html('<p>Có lỗi xảy ra khi sửa sản phẩm!</p>');
    }
  });
});

</script>
@endsection
