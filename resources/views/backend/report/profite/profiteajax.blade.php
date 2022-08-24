 @if (isset($profites))
   <div class="card radius-15">
     <div class="mb-4 card-header border-bottom-0">
       <div class="d-flex align-items-center">
         <div>

           <h5>All Attendance employee</h5>

         </div>

       </div>
     </div>
     <div class="card-body">
       <div class="table-responsive">

         <table id="example"
           class="table text-center table-striped table-bordered table-hover">
           <thead>
             <tr>
               <th>Student Fee</th>
               <th>Other Cost</th>
               <th>Employee Salary</th>
               <th>Total Cost</th>
               <th>Profite</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>

             <tr>

               <td>
                 {{ $student_fee }}
               </td>
               <td>{{ $other_cost }}</td>
               <td> {{ $emp_salary }} </td>
               <td>{{ round($total_cost) }}</td>
               <td>{{ round($profite) }}</td>
               <td>
                 <a class="btn btn-sm btn-success"
                   target="_blank"
                   href=""
                   data-toggle="tooltip"
                   title="Pay &#128221">Fee Slip
                 </a>
               </td>
             </tr>

           </tbody>
         </table>


       </div>
     </div>
   </div>
 @endif
