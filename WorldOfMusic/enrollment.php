<?php
include_once('base.php');
?>

<body>
    <div class='header d-flex justify-content-start bg-light'>
        <div class="my-4 container ">
            <h1>World of Music</h1>
            <h5>Enrollment</h5>
        </div>
    </div>
    <div class='container my-4'>
        <form action="">
            <div id="enrollment" class="carousel slide container" data-interval="false" data-ride="carousel">
                <div class='d-flex justify-content-end'>
                    <button class='p-2 btn-primary rounded-left'>Student</button>
                    <button class='p-2 btn-outline-primary rounded-right'>Working professional</button>
                </div>
                <!-- Indicators -->
                <!-- <ul class="carousel-indicators">
                    <li data-target="#enrollment" data-slide-to="0" class="active"></li>
                    <li data-target="#enrollment" data-slide-to="1"></li>
                    <li data-target="#enrollment" data-slide-to="2"></li>
                </ul> -->

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active" id='basic-info'>

                        <div class='student-info info'>
                            <div class="d-flex py-2 mt-4 my-3 border-bottom">
                                <h6>Student information</h6>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="studentName" class='mt-2 w-25'>Name: </label>
                                <input type="text" class='form-control w-50' name='studentName' id='studentName'>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="studentAge" class=' mt-2 w-25'>Gender: </label>
                                <div class='w-50'>
                                    <label class="check-box form-group  "> Male
                                        <input type="radio" name="gender" value="Male">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> Female
                                        <input type="radio" name="gender" value="Female">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="studentAge" class=' mt-2 w-25'>Age: </label>
                                <input type="number" class='form-control  w-50' name='studentAge' id='studentAge'>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="studentDob" class=' mt-2 w-25'>Date of birth: </label>
                                <input type="date" class='form-control  w-50' name='studentDob' id='studentDob'>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="address" class=' mt-2 w-25'>Address: </label>
                                <input type="text" class='form-control  w-50' name='address' id='address'>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="picture" class=' mt-2 w-25'>Picture/ Profile photo: </label>
                                <input type="file" class='form-control  w-50' name='picture' id='picture'>
                            </div>
                        </div>

                        <div class='parent1-info info'>
                            <div class="d-flex py-2 mt-4 my-3 border-bottom">
                                <h6>Father/Guardian 2 information</h6>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="fatherName" class='mt-2 w-25'>Name: </label>
                                <input type="text" class='form-control w-50' name='fatherName' id='fatherName'>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="fatherPhone" class=' mt-2 w-25'>Phone: </label>
                                <input type="number" class='form-control  w-50' name='fatherPhone' id='fatherPhone'>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="fatherEmail" class=' mt-2 w-25'>Email: </label>
                                <input type="email" class='form-control  w-50' name='fatherEmail' id='fatherEmail'>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="fatheroccupation" class=' mt-2 w-25'>Occupation: </label>
                                <input type="text" class='form-control  w-50' name='fatheroccupation' id='fatheroccupation'>
                            </div>


                        </div>

                        <div class='parent2-info info'>
                            <div class="d-flex py-2 mt-4 my-3 border-bottom">
                                <h6>Mother/Guardian 2 information</h6>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="motherName" class='mt-2 w-25'>Name: </label>
                                <input type="text" class='form-control w-50' name='motherName' id='motherName'>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="motherPhone" class=' mt-2 w-25'>Phone: </label>
                                <input type="number" class='form-control  w-50' name='motherPhone' id='motherPhone'>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="motherEmail" class=' mt-2 w-25'>Email: </label>
                                <input type="email" class='form-control  w-50' name='motherEmail' id='motherEmail'>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="motheroccupation" class=' mt-2 w-25'>Occupation: </label>
                                <input type="text" class='form-control  w-50' name='motheroccupation' id='motheroccupation'>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end my-5">
                            <a class="btn btn-primary float-right my-3" href="#enrollment" data-slide="next">
                                Next
                            </a>
                        </div>
                    </div>

                    <div class="carousel-item personalize-info">
                        <div class='cousre-info info'>
                            <div class="d-flex py-2 mt-4 my-3 border-bottom">
                                <h6>Course and Batch</h6>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="fatherName" class='mt-2 w-25'>Instrument: </label>
                                <div class='w-50'>
                                    <label class="check-box form-group  "> Guitar
                                        <input type="radio" name="Instrument" value="Guitar">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> Keyboard
                                        <input type="radio" name="Instrument" value="Keyboard">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> Drums
                                        <input type="radio" name="Instrument" value="Drums">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="fatherName" class='mt-2 w-25'>Does student have the instrument? </label>
                                <div class='w-50'>
                                    <label class="check-box form-group  "> Yes
                                        <input type="radio" name="haveInstrument" value="Yes">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> No
                                        <input type="radio" name="haveInstrument" value="No">
                                        <span class="checkmark"></span>
                                    </label>

                                </div>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="fatherName" class='mt-2 w-25'>Course: </label>
                                <div class='w-50'>
                                    <label class="check-box form-group  "> Hobby
                                        <input type="radio" name="Course" value="Hobby">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> Intermediate
                                        <input type="radio" name="Course" value="Intermediate">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> Advanced
                                        <input type="radio" name="Course" value="Advanced">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="fatherName" class='mt-2 w-25'>Batch: </label>
                                <div class='w-50'>
                                    <select name="batch-day" id="">
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thusday">Thusday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                    </select>
                                    <input type="number" max=12 min=1 maxlength="2" id="hours">
                                    <input type="number" max=59 min=0 maxlength="2" id="minutes">
                                    <select class="" id="slotTime">
                                        <option>AM</option>
                                        <option>PM</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row d-flex justify-content-around my-2">
                                <label for="joiningDate" class=' mt-2 w-25'>Date of joining: </label>
                                <input type="date" class='form-control  w-50' name='joiningDate' id='joiningDate'>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between my-5 mx-2">
                            <a class="btn btn-light   border border-dark" href="#enrollment" data-slide="prev">
                                Previous
                            </a>
                            <a class="btn btn-primary " href="#enrollment" data-slide="next">
                                Next
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item fee-info">
                        <div class='cousre-info info'>
                            <div class="d-flex py-2 mt-4 my-3 border-bottom">
                                <h6>Fee and other details</h6>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label class=' mt-2 w-25'>Advacend to be paid: </label>
                                <label class=' mt-2 w-50 font-weight-bold'>₹ 500</label>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="advancePaid" class='mt-2 w-25'>Advance paid </label>
                                <div class='w-50'>
                                    <label class="check-box form-group  "> Yes
                                        <input type="radio" name="advancePaid" value="Yes">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> No
                                        <input type="radio" name="advancePaid" value="No">
                                        <span class="checkmark"></span>
                                    </label>

                                </div>
                            </div>

                            <div class="row d-flex justify-content-around my-2">
                                <label class=' mt-2 w-25'>Fee to paid for the month of <?php echo date('F', strtotime('m')); ?>: </label>
                                <label class=' mt-2 w-50 font-weight-bold'>₹ 500</label>
                            </div>
                            <div class="row d-flex justify-content-around my-2">
                                <label for="advancePaid" class='mt-2 w-25'>Fee paid </label>
                                <div class='w-50'>
                                    <label class="check-box form-group  "> Yes
                                        <input type="radio" name="advancePaid" value="Yes">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> No
                                        <input type="radio" name="advancePaid" value="No">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="my-2 mx-2">
                                <label for="joiningDate" class=' mt-2'>How did they get to know about World of Music</label>

                                <div class='w-100'>
                                    <label class="check-box form-group  "> Google
                                        <input type="radio" name="awareness" value="Google">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> Instagram
                                        <input type="radio" name="awareness" value="Instagram">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> Facebook
                                        <input type="radio" name="awareness" value="Facebook">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> JustDial
                                        <input type="radio" name="awareness" value="JustDial">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> Word of Mouth
                                        <input type="radio" name="awareness" value="Word of Mouth">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="check-box form-group  "> Others
                                        <input type="radio" name="awareness" value="Others">
                                        <span class="checkmark"></span>
                                    </label>
                                    <input type="text" placeholder='Please Specify if Others' class='form-control  w-50' name='awarenessOther' id='awarenessOther'>

                                </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-between my-5 mx-2">
                            <a class="btn btn-light   border border-dark" href="#enrollment" data-slide="prev">
                                Previous
                            </a>

                            <button class="btn float-right btn-primary btn-block w-25">Submit</button>

                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>
</body>