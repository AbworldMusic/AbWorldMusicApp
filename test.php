<form action="post" class='form-group'>
                <label for="branchName" class="font-label mt-1">Branch Name</label>
                <input id="branchName" type="text" class="form-control"/>
                
                <label for="branchIncharge" class="font-label mt-1">Branch Incharge</label>
                <input id="branchIncharge" type="text" class="form-control"/>
                
                <label for="branchAge" class="font-label mt-3">Branch capacity</label>
                <input id="branchAge" type="number" min=0 max=120 class="form-control"/>
                
                <label for="branchPhone" class="font-label mt-3">Branch phone</label>
                <input id="branchPhone" type="number" min=1000000000 max=9999999999 class="form-control"/>

                <button type="submit" class="btn btn-info mt-4">Submit</button>
            </form>