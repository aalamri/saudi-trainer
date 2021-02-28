<template>
  <div class="container">
    <div class="row mt-5" v-if="$gate.isAdmin()">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Courses</h3>
            <div class="card-tools">
              <button class="btn btn-success" @click="newModal">
                Add New
                <i class="fas fa-book-plus fa-fw"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <tbody>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>attendance_type</th>
                  <th>Registered At</th>
                  <th>Modify</th>
                </tr>

                <tr v-for="course in courses.data" :key="course.id">
                  <td>{{course.id}}</td>
                  <td>{{course.title}}</td>
                  <td>{{course.description}}</td>
                  <td>{{course.attendance_type | upText}}</td>
                  <td>{{course.created_at | myDate}}</td>
                  <td>
                    <a href="#" @click="editModal(course)">
                      <i class="fa fa-edit blue"></i>
                    </a>
                    /
                    <a href="#" @click="deleteCourse(course.id)">
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <pagination :data="courses" @pagination-change-page="getResults"></pagination>

          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

    <div v-if="!$gate.isAdmin()">
      <not-found></not-found>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addNew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addNew"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Add New</h5>
            <h5 v-show="editmode" class="modal-title" id="addNewLabel">Update Course's Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateCourse(): createCourse()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.title"
                  id="title"
                  type="text"
                  name="title"
                  placeholder="Enter Course title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <has-error :form="form" field="title"></has-error>
              </div>
              <!-- <div class="form-group">
                <input
                  v-model="form.description"
                  id="description"
                  type="text"
                  name="description"
                  placeholder="Enter course description"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('description') }"
                />
                <has-error :form="form" field="description"></has-error>
              </div> -->
              <div class="form-group">
                <textarea
                  v-model="form.description"
                  id="description"
                  type="text"
                  name="description"
                  placeholder="Enter course description"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('description') }"
                />
                <has-error :form="form" field="bio"></has-error>
              </div>
              <div class="form-group">
                <select
                  v-model="form.attendance_type"
                  id="attendance_type"
                  name="attendance_type"
                  class="form-control"
                  :class="{ 
                'is-invalid': form.errors.has('attendance_type') }"
                >
                  <option value>Select Attendance Type</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="both">Male/Female</option>
                </select>
                <has-error :form="form" field="attendance_type"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      courses: {},
      form: new Form({
        id: "",
        title: "",
        description: "",
        attendance_type: ""
      })
    };
  },
  methods: {
    getResults(page = 1) {
                        axios.get('api/course?page=' + page)
                            .then(response => {
                                this.courses = response.data;
                            });
    },
    updateCourse() {
      this.$Progress.start();
      // console.log('Editing data');
      this.form
        .put("api/course/" + this.form.id)
            .then(() => {
              Swal.fire("Update!", "Course info has been update.", "success");
              this.$Progress.finish();
              Fire.$emit("AfterCreation");
            })
            .catch(() => {
              Swal.fire("Failed!", "There was something wronge.", "warning");
              this.$Progress.fail();
            });
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    editModal(course) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(course);
    },
    deleteCourse(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        // Send request to the server
        if (result.value) {
          this.form
            .delete("api/course/" + id)
            .then(() => {
              Swal.fire("Deleted!", "Course file has been deleted.", "success");
              Fire.$emit("AfterCreation");
            })
            .catch(() => {
              Swal.fire("Failed!", "There was something wronge.", "warning");
            });
        }
      });
    },
    loadCourses() {
      // if(this.$gate.isAdmin()){
      axios.get("api/course").then(({ data }) => (this.courses = data));
      // }
    },
    createCourse() {
      this.$Progress.start();
      this.form
        .post("api/course")
        .then(() => {
          Fire.$emit("AfterCreation");
          $("#addNew").modal("hide");
          toast.fire({
            type: "success",
            title: "Course Created in successfully",
            icon: "success"
          });
          this.$Progress.finish();
        })

        .catch(() => {});
    }
  },
  created() {
    Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get('api/findCourse?q=' + query)
                .then((data) => {
                    this.courses = data.data
                })
                .catch(() => {

                })
    })
    this.loadCourses();
    Fire.$on("AfterCreation", () => {
      this.loadCourses();
    });
    //to send request to backend
    // setInterval(()=> this.loadUsers(), 10000);
  }
};
</script>
