<?php include 'assets/inc/header.php'; ?>
<div class="container mt-5">
    <form class="form-control p-4" action="#" method="POST">
        <div class="mb-4">
            <label for="exampleInputitem" class="form-label">Book Name</label>
            <input type="text" class="form-control" id="exampleInputitem" aria-describedby="">
        </div>
        <div class="mb-4">
            <label class="form-label" for="">Division</label>
            <select class="form-select " aria-label="Default select example">
                <option selected value="-1" disabled>Select</option>
                <option value="1">Dhaka</option>
                <option value="2">Chittagong</option>
                <option value="3">Sylhet</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="">District</label>
            <select class="form-select " aria-label="Default select example">
                <option selected value="-1" disabled>Select</option>
                <option value="1">Dhaka</option>
                <option value="2">Faridpur</option>
                <option value="3">Rajbari</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="">Area</label>
            <select class="form-select " aria-label="Default select example">
                <option selected value="-1" disabled>Select</option>
                <option value="1">Mirpur</option>
                <option value="2">Dhanmondi</option>
                <option value="3">Dhaka Cantonment</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="">Author Name</label>
            <select class="form-select " aria-label="Default select example">
                <option selected value="-1" disabled>Select</option>
                <option value="1">Rabindranath</option>
                <option value="2">John Donne</option>
                <option value="3">Shakespeare</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="">Category</label>
            <select class="form-select" aria-label="Default select example">
                <option selected value="-1" disabled>Select</option>
                <option value="1">Academic</option>
                <option value="2">Job Seeker</option>
                <option value="3">Tragegy</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="">Publications</label>
            <select class="form-select" aria-label="Default select example">
                <option selected value="-1" disabled>Select</option>
                <option value="1">Janani Publications </option>
                <option value="2">Popy Publications</option>
                <option value="3">Brother's Publications</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="">Condition :</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Used</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">New</label>
            </div>
        </div>
        <div class="mb-4">
            <label for="exampleInputprice" class="form-label">Price</label>
            <input type="number" class="form-control" id="exampleInputprice">
        </div>

        <div class="mb-4">
            <label for="formFileSm" class="form-label">Choose Image</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file">
        </div>
        <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include 'assets/inc/footer.php'; ?>