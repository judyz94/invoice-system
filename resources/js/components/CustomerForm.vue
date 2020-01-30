<template>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Full Name</label>
                <ValidationProvider name="name" rules="required|min:5" v-slot="{ errors }">
                    <input v-model="value" type="text" class="form-control" id="name" name="name" placeholder="Type a full name">
                    <span>{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>ID</label>
                <ValidationProvider rules="required|numeric" v-slot="{ errors }">
                    <input type="text" v-model="value" class="form-control" id="document" name="document" placeholder="Type a ID">
                    <span>{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Email</label> <!--LAS PALABRAS PARA CAMBIAR EL LENGUAJE ENTRE COMILLAS .ES?-->
                <ValidationProvider name="email" rules="required|email" v-slot="{ errors }">
                        <input v-model="email" type="text" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <!-- CÓMO UTILIZAR EL OLD?
                               value="{{ old('email',  $customer => email) }}" required-->
                        <span>{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Type a phone">
            </div>
        </div>

        <!-- CÓMO UTILIZAR LOS DATOS FORÁNEOS?
        <div class="col-md-4">
            <div class="form-group">
                <label for="city_id">{{ __('City') }}</label>
                <select class="custom-select" id="city_id" name="city_id" required>
                    <option value="">{{ __('Select a city') }}</option>
                    @foreach($cities as $city)
                    <option value="{{ $city => id }}"
                            {{ old('city_id', $customer->city_id) == $city->id ? 'selected' : ''}}>{{ $city => name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>-->

        <div class="col-md-4">
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Type a address">
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "CustomerForm"
    }
</script>

<style scoped>

</style>
