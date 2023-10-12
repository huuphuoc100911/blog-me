@extends('admin.layouts.layout')
@section('page-title', 'Dashboard')
@push('styles')
    <style>
        .hidden {
            display: none;
        }

        #image-preview img {
            height: 300px;
            width: 300px;
            margin: 15px;
        }
    </style>
@endpush
@section('content')
    <div class="content-w>rapper" <!--="" content="" --="">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Basic Inputs</h4>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 row">
                        <div class="card-body">
                            <form action="" class="row">
                                <div class="col-3">
                                    <select class="form-select mb-3" name="city" id="city"
                                        aria-label=".form-select-sm">
                                        <option value="" selected>Chọn tỉnh thành</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-select mb-3" name="district" id="district"
                                        aria-label=".form-select-sm">
                                        <option value="" selected>Chọn quận huyện</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-select" name="ward" id="ward" aria-label=".form-select-sm">
                                        <option value="" selected>Chọn phường xã</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Input Sizing -->
                <div class="col-12">
                    <div class="card mb-4 row">
                        <div class="card-body">
                            <label for="" class="form-label">Add Question</label>
                            <div class="row">
                                <div class="col-5">
                                    <select class="form-select" id="typeQuestion" name="typeQuestion">
                                        <option value="text">Text</option>
                                        <option value="text-area">Text Area</option>
                                        <option value="date">Date</option>
                                        <option value="radio">Radio</option>
                                        <option value="checkbox">Checkbox</option>
                                        <option value="select">Select</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <a class="btn btn-info" id="addQuestion" style="color: white">Thêm câu hỏi</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-10" style="margin: 30px">
                            <form id="question-form" action="" method="post">
                                @csrf
                                <div class="container" id="new_question"></div>
                                <input type="submit" class="btn btn-success mt-5 ml-1 question-submit hidden"
                                    value="Submit">
                            </form>
                        </div>
                        <div class="row mb-5">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                                <input class="form-control" name="fileUpload[]" type="file" id="formFileMultiple"
                                    multiple />
                            </div>
                            <img id="image0" />
                            <div id="image-preview"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Basic Inputs</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Default</h5>
                    <div class="card-body">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="John Doe"
                                aria-describedby="defaultFormControlHelp" />
                            <div id="defaultFormControlHelp" class="form-text">
                                We'll never share your details with anyone else.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Float label</h5>
                    <div class="card-body">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="John Doe"
                                aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">Name</label>
                            <div id="floatingInputHelp" class="form-text">
                                We'll never share your details with anyone else.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form controls -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Form Controls</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Read only</label>
                            <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1"
                                placeholder="Readonly input here..." readonly />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Read plain</label>
                            <input type="text" readonly class="form-control-plaintext"
                                id="exampleFormControlReadOnlyInputPlain1" value="email@example.com" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Example select</label>
                            <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleDataList" class="form-label">Datalist example</label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList"
                                placeholder="Type to search..." />
                            <datalist id="datalistOptions">
                                <option value="San Francisco"></option>
                                <option value="New York"></option>
                                <option value="Seattle"></option>
                                <option value="Los Angeles"></option>
                                <option value="Chicago"></option>
                            </datalist>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect2" class="form-label">Example multiple select</label>
                            <select multiple class="form-select" id="exampleFormControlSelect2"
                                aria-label="Multiple select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div>
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input Sizing -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Input Sizing</h5>
                    <div class="card-body">
                        <small class="text-light fw-semibold">Input text</small>

                        <div class="mt-2 mb-3">
                            <label for="largeInput" class="form-label">Large input</label>
                            <input id="largeInput" class="form-control form-control-lg" type="text"
                                placeholder=".form-control-lg" />
                        </div>
                        <div class="mb-3">
                            <label for="defaultInput" class="form-label">Default input</label>
                            <input id="defaultInput" class="form-control" type="text" placeholder="Default input" />
                        </div>
                        <div>
                            <label for="smallInput" class="form-label">Small input</label>
                            <input id="smallInput" class="form-control form-control-sm" type="text"
                                placeholder=".form-control-sm" />
                        </div>
                    </div>
                    <hr class="m-0" />
                    <div class="card-body">
                        <small class="text-light fw-semibold">Input select</small>
                        <div class="mt-2 mb-3">
                            <label for="largeSelect" class="form-label">Large select</label>
                            <select id="largeSelect" class="form-select form-select-lg">
                                <option>Large select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">Default select</label>
                            <select id="defaultSelect" class="form-select">
                                <option>Default select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div>
                            <label for="smallSelect" class="form-label">Small select</label>
                            <select id="smallSelect" class="form-select form-select-sm">
                                <option>Small select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Default Checkboxes and radios & Default checkboxes and radios -->
            <div class="col-xl-6">
                <div class="card mb-4">
                    <h5 class="card-header">Checkboxes and Radios</h5>
                    <!-- Checkboxes and Radios -->
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md">
                                <small class="text-light fw-semibold">Checkboxes</small>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                    <label class="form-check-label" for="defaultCheck1"> Unchecked </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2"
                                        checked />
                                    <label class="form-check-label" for="defaultCheck2"> Indeterminate </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck3"
                                        checked />
                                    <label class="form-check-label" for="defaultCheck3"> Checked </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="disabledCheck1"
                                        disabled />
                                    <label class="form-check-label" for="disabledCheck1"> Disabled Unchecked </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="disabledCheck2"
                                        disabled checked />
                                    <label class="form-check-label" for="disabledCheck2"> Disabled Checked </label>
                                </div>
                            </div>
                            <div class="col-md">
                                <small class="text-light fw-semibold">Radio</small>
                                <div class="form-check mt-3">
                                    <input name="default-radio-1" class="form-check-input" type="radio" value=""
                                        id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1"> Unchecked </label>
                                </div>
                                <div class="form-check">
                                    <input name="default-radio-1" class="form-check-input" type="radio" value=""
                                        id="defaultRadio2" checked />
                                    <label class="form-check-label" for="defaultRadio2"> Checked </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="" id="disabledRadio1"
                                        disabled />
                                    <label class="form-check-label" for="disabledRadio1"> Disabled unchecked </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="" id="disabledRadio2"
                                        disabled checked />
                                    <label class="form-check-label" for="disabledRadio2"> Disabled checkbox </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="m-0" />
                    <!-- Inline Checkboxes -->
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md">
                                <small class="text-light fw-semibold d-block">Inline Checkboxes</small>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                        value="option1" />
                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                        value="option2" />
                                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3"
                                        disabled />
                                    <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <small class="text-light fw-semibold d-block">Inline Radio</small>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio1" value="option1" />
                                    <label class="form-check-label" for="inlineRadio1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio2" value="option2" />
                                    <label class="form-check-label" for="inlineRadio2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio3" value="option3" disabled />
                                    <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Switches -->
                <div class="card mb-4">
                    <h5 class="card-header">Switches</h5>
                    <div class="card-body">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" />
                            <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox
                                input</label>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox
                                input</label>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled />
                            <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox
                                input</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked
                                disabled />
                            <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch
                                checkbox input</label>
                        </div>
                    </div>
                </div>

                <!-- Range -->
                <div class="card mb-4 mb-xl-0">
                    <h5 class="card-header">Range</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formRange1" class="form-label">Example range</label>
                            <input type="range" class="form-range" id="formRange1" />
                        </div>
                        <div class="mb-3">
                            <label for="disabledRange" class="form-label">Disabled range</label>
                            <input type="range" class="form-range" id="disabledRange" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="formRange2" class="form-label">Min and max</label>
                            <input type="range" class="form-range" min="0" max="5" id="formRange2" />
                        </div>
                        <div>
                            <label for="formRange3" class="form-label">Steps</label>
                            <input type="range" class="form-range" min="0" max="5" step="0.5"
                                id="formRange3" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <!-- HTML5 Inputs -->
                <div class="card mb-4">
                    <h5 class="card-header">HTML5 Inputs</h5>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Text</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="Sneat" id="html5-text-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-2 col-form-label">Search</label>
                            <div class="col-md-10">
                                <input class="form-control" type="search" value="Search ..." id="html5-search-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" value="john@example.com"
                                    id="html5-email-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-url-input" class="col-md-2 col-form-label">URL</label>
                            <div class="col-md-10">
                                <input class="form-control" type="url" value="https://themeselection.com"
                                    id="html5-url-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-tel-input" class="col-md-2 col-form-label">Phone</label>
                            <div class="col-md-10">
                                <input class="form-control" type="tel" value="90-(164)-188-556"
                                    id="html5-tel-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" value="password"
                                    id="html5-password-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">Number</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" value="18" id="html5-number-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00"
                                    id="html5-datetime-local-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-month-input" class="col-md-2 col-form-label">Month</label>
                            <div class="col-md-10">
                                <input class="form-control" type="month" value="2021-06" id="html5-month-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-week-input" class="col-md-2 col-form-label">Week</label>
                            <div class="col-md-10">
                                <input class="form-control" type="week" value="2021-W25" id="html5-week-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
                            <div class="col-md-10">
                                <input class="form-control" type="time" value="12:30:00" id="html5-time-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-color-input" class="col-md-2 col-form-label">Color</label>
                            <div class="col-md-10">
                                <input class="form-control" type="color" value="#666EE8" id="html5-color-input" />
                            </div>
                        </div>
                        <div class="row">
                            <label for="html5-range" class="col-md-2 col-form-label">Range</label>
                            <div class="col-md-10">
                                <input type="range" class="form-range mt-3" id="html5-range" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- File input -->
                <div class="card">
                    <h5 class="card-header">File input</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile" />
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple />
                        </div>
                        <div>
                            <label for="formFileDisabled" class="form-label">Disabled file input example</label>
                            <input class="form-control" type="file" id="formFileDisabled" disabled />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Input groups</h4>

        <div class="row">
            <!-- Basic -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Basic</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">@</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                aria-describedby="basic-addon11" />
                        </div>

                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="basic-default-password12"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="basic-default-password2" />
                                <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                        class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Recipient's username"
                                aria-label="Recipient's username" aria-describedby="basic-addon13" />
                            <span class="input-group-text" id="basic-addon13">@example.com</span>
                        </div>

                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon14">https://example.com/users/</span>
                            <input type="text" class="form-control" placeholder="URL" id="basic-url1"
                                aria-describedby="basic-addon14" />
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" placeholder="Amount"
                                aria-label="Amount (to the nearest dollar)" />
                            <span class="input-group-text">.00</span>
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">With textarea</span>
                            <textarea class="form-control" aria-label="With textarea" placeholder="Comment"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Merged -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Merged</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search..." aria-label="Search..."
                                aria-describedby="basic-addon-search31" />
                        </div>

                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password32">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" id="basic-default-password32"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="basic-default-password" />
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                        class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="Recipient's username"
                                aria-label="Recipient's username" aria-describedby="basic-addon33" />
                            <span class="input-group-text" id="basic-addon33">@example.com</span>
                        </div>

                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon34">https://example.com/users/</span>
                            <input type="text" class="form-control" id="basic-url3"
                                aria-describedby="basic-addon34" />
                        </div>

                        <div class="input-group input-group-merge">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" placeholder="100"
                                aria-label="Amount (to the nearest dollar)" />
                            <span class="input-group-text">.00</span>
                        </div>

                        <div class="input-group input-group-merge">
                            <span class="input-group-text">With textarea</span>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sizing -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Sizing</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Username" />
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Username" />
                        </div>

                        <div class="input-group input-group-sm">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Username" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Checkbox and radio addons -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Checkbox and radio addons</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="input-group">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value=""
                                    aria-label="Checkbox for following text input" />
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox" />
                        </div>

                        <div class="input-group">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="radio" value=""
                                    aria-label="Radio button for following text input" />
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with radio button" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Multiple inputs & addon -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Multiple inputs & addon</h5>

                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <small class="text-light fw-semibold d-block">Multiple inputs</small>
                        <div class="input-group">
                            <span class="input-group-text">First and last name</span>
                            <input type="text" aria-label="First name" class="form-control" />
                            <input type="text" aria-label="Last name" class="form-control" />
                        </div>

                        <small class="text-light fw-semibold d-block pt-3">Multiple addons</small>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">0.00</span>
                            <input type="text" class="form-control"
                                aria-label="Dollar amount (with dot and two decimal places)" />
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control"
                                aria-label="Dollar amount (with dot and two decimal places)" />
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">0.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Speech To Text -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Speech To Text</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <small class="text-light fw-semibold d-block">Input Group</small>

                        <div class="input-group input-group-merge speech-to-text">
                            <input type="text" class="form-control" placeholder="Say it"
                                aria-describedby="text-to-speech-addon" />
                            <span class="input-group-text" id="text-to-speech-addon">
                                <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                            </span>
                        </div>

                        <small class="text-light fw-semibold d-block pt-3">Textarea</small>

                        <div class="input-group input-group-merge speech-to-text">
                            <textarea class="form-control" placeholder="Say it" rows="2"></textarea>
                            <span class="input-group-text">
                                <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button with dropdowns & addons -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Button with dropdowns & addons</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <small class="text-light fw-semibold d-block">Button addons</small>
                        <div class="input-group">
                            <button class="btn btn-outline-primary" type="button" id="button-addon1">Button</button>
                            <input type="text" class="form-control" placeholder=""
                                aria-label="Example text with button addon" aria-describedby="button-addon1" />
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Recipient's username"
                                aria-label="Recipient's username" aria-describedby="button-addon2" />
                            <button class="btn btn-outline-primary" type="button" id="button-addon2">Button</button>
                        </div>

                        <div class="input-group">
                            <button class="btn btn-outline-primary" type="button">Button</button>
                            <button class="btn btn-outline-primary" type="button">Button</button>
                            <input type="text" class="form-control" placeholder=""
                                aria-label="Example text with two button addons" />
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Recipient's username"
                                aria-label="Recipient's username with two button addons" />
                            <button class="btn btn-outline-primary" type="button">Button</button>
                            <button class="btn btn-outline-primary" type="button">Button</button>
                        </div>

                        <small class="text-light fw-semibold d-block pt-3">Button with dropdowns</small>
                        <div class="input-group">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                            </ul>
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" />
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" />
                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                            </ul>
                        </div>

                        <div class="input-group">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">Action before</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Another action before</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                            </ul>
                            <input type="text" class="form-control" aria-label="Text input with 2 dropdown buttons" />
                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Segmented buttons -->
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Segmented buttons</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-primary">Action</button>
                                    <button type="button"
                                        class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                                    </ul>
                                    <input type="text" class="form-control"
                                        aria-label="Text input with segmented dropdown button" />
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        aria-label="Text input with segmented dropdown button" />
                                    <button type="button" class="btn btn-outline-primary">Action</button>
                                    <button type="button"
                                        class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Custom select -->
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Custom select</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div class="input-group">
                                    <select class="form-select" id="inputGroupSelect02">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                </div>

                                <div class="input-group">
                                    <button class="btn btn-outline-primary" type="button">Button</button>
                                    <select class="form-select" id="inputGroupSelect03"
                                        aria-label="Example select with button addon">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div class="input-group">
                                    <select class="form-select" id="inputGroupSelect04"
                                        aria-label="Example select with button addon">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <button class="btn btn-outline-primary" type="button">Button</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom file input -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Custom file input</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                            <input type="file" class="form-control" id="inputGroupFile01" />
                        </div>

                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile02" />
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>

                        <div class="input-group">
                            <button class="btn btn-outline-primary" type="button"
                                id="inputGroupFileAddon03">Button</button>
                            <input type="file" class="form-control" id="inputGroupFile03"
                                aria-describedby="inputGroupFileAddon03" aria-label="Upload" />
                        </div>

                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                            <button class="btn btn-outline-primary" type="button"
                                id="inputGroupFileAddon04">Button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            console.log(123132);
            console.log(result.data);
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Name);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Name === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Name);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Name === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Name);
                    }
                }
            };
        }
    </script>
    <script>
        $(function() {
            $("#formFileMultiple").change(showMultipleImage);
        });

        function showMultipleImage() {
            var files = $('#formFileMultiple')[0].files;

            var imagePreview = $('#image-preview');
            imagePreview.empty();

            $.each(files, function(index, file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = $('<img>').attr('src', e.target.result);
                    imagePreview.append(img);
                };

                reader.readAsDataURL(file);
            });
        }

        var option = 1;
        var optionRadio = 1;
        var optionCheckbox = 1;
        var optionSelect = 1;

        $("#addQuestion").click(function() {
            $('.question-submit').removeClass('hidden')
            var typeQuestion = $('#typeQuestion').val();
            if (typeQuestion === "text" || typeQuestion == 'text-area' || typeQuestion == 'date') {
                var new_input =
                    `<div class="row mb-3" id="question_${option}">
                            <label for="" class="form-label">${typeQuestion}</label>
                            <div class="col-6">
                                <input type="hidden" value="${typeQuestion}" id="typeQuestion_${option}" name="typeQuestion[${option}]">
                                <input placeholder="${typeQuestion}" type="text" name="question[${option}]" class="form-control col-sm-12">
                            </div>
                            <div class="col-4 text-right">
                                <i class="bx bx-message-square-x padding-option" style="margin-top: 8px" aria-hidden="true" onclick="removeQuestion(${option})"></i>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-6">
                                    <span class="error text-danger pt-1 error_message" id="error_question_${option}" role="alert"></span>
                                </div>
                            </div>
                        </div>`;
            } else if (typeQuestion === "radio") {
                var new_input =
                    `<div class="row mt-2 background-question p-3" id="question_${option}">
                            <label class="col-2 col-form-label">${typeQuestion}</label>
                            <div class="col-6">
                                <input type="hidden" value="${typeQuestion}" id="typeQuestion_${option}" name="typeQuestion[${option}]">
                                <input placeholder="Option" type="text" name="question[${option}]" class="form-control col-sm-12">
                            </div>
                            <div class="col-4 text-right">
                                <i class="bx bx-message-square-x padding-option" style="margin-top: 8px" aria-hidden="true" onclick="removeQuestion(${option})"></i>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-6">
                                    <span class="error text-danger pt-1 error_message" id="error_question_${option}" role="alert"></span>
                                </div>
                            </div>
                            <div class="col-4 text-right">
                            <i class="fa fa-trash padding-option" aria-hidden="true" onclick="removeQuestion(${option})"></i>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2"></div>
                            <div class="col-6">
                                <span class="error text-danger pt-1 error_message" id="error_question_${option}" role="alert"></span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-6" id="addRadio_${option}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2"></div>
                            <div class="col-6">
                                <a class="btn btn-secondary" style="width: 150px; color:white" onclick="addRadio(${option})">Add Radio</a>
                            </div>
                        <div>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-6">
                                <span class="error text-danger pt-1 error_message" id="error_radio_${option}" role="alert"></span>
                            </div>
                        </div>
                    </div>`;
            } else if (typeQuestion === "checkbox") {
                var new_input =
                    `<div class="row mt-2 background-question p-3" id="question_${option}">
                        <label class="col-2 col-form-label">${typeQuestion}</label>
                        <div class="col-6">
                            <input type="hidden" value="${typeQuestion}" id="typeQuestion_${option}" name="typeQuestion[${option}]">
                            <input placeholder="checkbox" type="text" name="question[${option}]" class="form-control col-sm-12">
                        </div>
                        <div class="col-4 text-right">
                            <i class="bx bx-message-square-x padding-option" style="margin-top: 8px" aria-hidden="true" onclick="removeQuestion(${option})"></i>                        </div>
                        <div class="row mb-3">
                            <div class="col-2"></div>
                            <div class="col-6">
                                <span class="error text-danger pt-1 error_message" id="error_question_${option}" role="alert"></span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-6" id="addCheckbox_${option}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2"></div>
                            <div class="col-6">
                                <a class="btn btn-secondary" style="width: 150px; color:white" onclick="addCheckbox(${option})">Add Checkbox</a>
                            </div>
                        <div>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-6">
                                <span class="error text-danger pt-1 error_message" id="error_checkbox_${option}" role="alert"></span>
                            </div>
                        </div>
                    </div>`;
            } else if (typeQuestion === "select") {
                var new_input =
                    `<div class="row mt-2 background-question p-3" id="question_${option}">
                        <label class="col-2 col-form-label">${typeQuestion}</label>
                        <div class="col-6">
                            <input type="hidden" value="${typeQuestion}" id="typeQuestion_${option}" name="typeQuestion[${option}]">
                            <input placeholder="select" type="text" name="question[${option}]" class="form-control col-sm-12">
                        </div>
                        <div class="col-4 text-right">
                            <i class="bx bx-message-square-x padding-option" style="margin-top: 8px" aria-hidden="true" onclick="removeQuestion(${option})"></i>                        </div>
                        <div class="row mb-3">
                            <div class="col-2"></div>
                            <div class="col-6">
                                <span class="error text-danger pt-1 error_message" id="error_question_${option}" role="alert"></span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-6" id="addSelect_${option}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2"></div>
                            <div class="col-6">
                                <a class="btn btn-secondary" style="width: 150px; color:white" onclick="addSelect(${option})">Add Select</a>
                            </div>
                        <div>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-6">
                                <span class="error text-danger pt-1 error_message" id="error_select_${option}" role="alert"></span>
                            </div>
                        </div>
                    </div>`;
            }

            $('#new_question').append(new_input);

            option++;
        })

        function addRadio(value) {
            let new_radio =
                `<div class="input-group mt-1 row" id="input_radio_${optionRadio}">
                    <div class="col-1 text-right">
                        <i class="bx bx-radio-circle-marked padding-option" style="margin-top: 8px"></i>
                    </div>
                    <div class="col-8">
                        <input type="text" placeholder="" name="radio[${value}][${optionRadio}]" class="form-control">
                    </div>
                    <div class="col-1 text-left">
                        <i class="bx bx-message-square-x padding-option" style="margin-top: 8px" onclick="removeOptionRadio(${optionRadio}, ${value})"></i>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <span class="error text-danger pt-1 error_message" id="error_radio_${value}_${optionRadio}" role="alert"></span>
                    </div>
                <div>`;

            $('#addRadio_' + value).append(new_radio);
            optionRadio++;
        }

        function addCheckbox(value) {
            let new_checkbox =
                `<div class="input-group mt-1 row" id="input_checkbox_${optionCheckbox}">
                    <div class="col-1 text-right">
                        <i class="bx bx-checkbox-checked padding-option" style="margin-top: 8px"></i>
                    </div>
                    <div class="col-8">
                        <input type="text" name="checkbox[${value}][${optionCheckbox}]" class="form-control">
                    </div>
                    <div class="col-1 text-left">
                        <i class="bx bx-message-square-x padding-option" style="margin-top: 8px" onclick="removeOptionCheckbox(${optionCheckbox}, ${value})"></i>
                    </div>
                    <div class="row mt-2">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <span class="error text-danger pt-1 error_message" id="error_checkbox_${value}_${optionCheckbox}" role="alert"></span>
                        </div>
                <div>
                </div>`;

            $('#addCheckbox_' + value).append(new_checkbox);
            optionCheckbox++;
        }

        function addSelect(value) {
            let new_select =
                `<div class="input-group mt-1 row" id="input_select_${optionSelect}">
                    <div class="col-1 text-right">
                        <i class="bx bx-down-arrow padding-option" style="margin-top: 8px"></i>
                    </div>
                    <div class="col-8">
                        <input type="text" name="select[${value}][${optionCheckbox}]" class="form-control">
                    </div>
                    <div class="col-1 text-left">
                        <i class="bx bx-message-square-x padding-option" style="margin-top: 8px" onclick="removeOptionSelect(${optionSelect}, ${value})"></i>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <span class="error text-danger pt-1 error_message" id="error_select_${value}_${optionSelect}" role="alert"></span>
                    </div>
                <div>`;

            $('#addSelect_' + value).append(new_select);
            optionSelect++;
        }


        function removeQuestion(option) {
            var remove_field = '#question_' + option;
            $(remove_field).remove();
        }

        function removeOptionRadio(option, value) {
            var remove_field = '#input_radio_' + option;
            $(remove_field).remove();
        }

        function removeOptionCheckbox(option, value) {
            var remove_field = '#input_checkbox_' + option;
            $(remove_field).remove();
        }

        function removeOptionSelect(option, value) {
            var remove_field = '#input_select_' + option;
            $(remove_field).remove();
        }
    </script>
@endpush
