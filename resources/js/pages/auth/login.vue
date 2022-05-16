<template>
  <div class="relative w-full h-ful l py-40 min-h-screen">
    <div class="container mx-auto px-4 ">
      <div class="flex content-center items-center justify-center">
        <card>
          <form @submit.prevent="login" @keydown="form.onKeydown($event)">
            <!-- Username -->
            <div class=" bg-purple-200 p-8 rounded-b-2xl rounded-t-2xl">
              
              <label class="col-md-3 col-form-label text-md-right">Gmail</label>
              <div class="col-md-7">
                <input v-model="form.username" :class="{ 'is-invalid': form.errors.has('username') }" class="form-control" type="email" name="username">
                <has-error :form="form" field="username" />
              </div>
            
              <label class="col-md-3 col-form-label text-md-right">Password</label>
              <div class="col-md-7">
                <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
                <has-error :form="form" field="password" />
              </div>
              <checkbox v-model="remember" name="remember">
                  Remember Me
                </checkbox>
              <v-button :loading="form.busy" class="btn btn-primary bg-blue-400 rounded-b-2xl rounded-t-2xl p-2 font-medium text-white ml-12 hover:bg-blue-600 ">
                  Login
                </v-button>
            </div>

            <!-- Remember Me -->
            <div class="form-group row">
              <div class="col-md-3" />
              <div class="col-md-7 d-flex">
                
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-7 offset-md-3 d-flex">
                <!-- Submit Button -->
                
              </div>
            </div>
          </form>
        </card>
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import axios from 'axios'

export default {
  middleware: 'guest',

  metaInfo () {
    return { title: 'Login' }
  },

  data: () => ({
    form: new Form({
      grant_type : "password",
      client_id : process.env.MIX_PASSPORT_ID,
      client_secret : process.env.MIX_PASSPORT_SECRET,
      username: '',
      password: '',
      scope : ''
    }),
    remember: false
  }),

  methods: {
    async login () {
      // Submit the form.
      const { data } = await this.form.post('/oauth/token')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.access_token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.$router.push({ name: 'home' })
    }
  }
}
</script>
