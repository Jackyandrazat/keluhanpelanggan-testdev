<template>
	<div class="flex flex-wrap -mx-3 mb-5">
		<div class="w-full max-w-full px-3 mb-6 mx-auto">
			<div
				class="relative flex-[1_auto] flex flex-col break-words min-w-0 bg-clip-border rounded-[.95rem] bg-white m-5">
				<div
					class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-light/30">
					<!-- Card Header -->
					<div class="px-9 pt-5 flex justify-between items-stretch flex-wrap min-h-[70px] pb-0 bg-transparent">
						<h3 class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-xl/tight text-dark">
							<span class="mr-3 font-semibold text-dark">Keluhan Pelanggan</span>
							<span class="mt-1 font-medium text-secondary-dark text-lg/normal">Seluruh Keluhan
								Pelanggan</span>
						</h3>
						<div class="relative flex flex-wrap items-center my-2">
							<a @click="showAddForm = true"
								class="inline-block text-[.925rem] font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-150 ease-in-out text-light-inverse bg-light-dark border-light shadow-none border-0 py-2 px-5 hover:bg-secondary active:bg-light focus:bg-light">
								Add Keluhan
							</a>
							<a @click="exportXlsx()"
								class="inline-block text-[.925rem] font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-150 ease-in-out text-light-inverse bg-light-dark border-light shadow-none border-0 py-2 px-5 hover:bg-secondary active:bg-light focus:bg-light">
								Export XLSX
							</a>
							<a @click="exportCsv()"
								class="inline-block text-[.925rem] font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-150 ease-in-out text-light-inverse bg-light-dark border-light shadow-none border-0 py-2 px-5 hover:bg-secondary active:bg-light focus:bg-light">
								Export CSV
							</a>
							<a @click="exportTxt()"
								class="inline-block text-[.925rem] font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-150 ease-in-out text-light-inverse bg-light-dark border-light shadow-none border-0 py-2 px-5 hover:bg-secondary active:bg-light focus:bg-light">
								Export TXT
							</a>
							<a @click="exportPdf()"
								class="inline-block text-[.925rem] font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-150 ease-in-out text-light-inverse bg-light-dark border-light shadow-none border-0 py-2 px-5 hover:bg-secondary active:bg-light focus:bg-light">
								Export PDF
							</a>
						</div>
					</div>
					<!-- End Card Header -->
					<!-- Card Body -->
					<div class="flex-auto block py-8 pt-6 px-9">
						<div class="overflow-x-auto">
							<table class="w-full my-0 align-center text-dark border-neutral-200 table-auto">
								<thead class="align-content-center">
									<tr class="font-semibold text-[0.95rem] text-secondary-dark">
										<th class="pb-3 px-4 py-2 text-start min-w-[175px]">ID</th>
										<th class="pb-3 px-4 py-2 text-start min-w-[175px]">NAMA</th>
										<th class="pb-3 px-4 py-2 text-start min-w-[175px]">EMAIL</th>
										<th class="pb-3 px-4 py-2 text-start min-w-[175px]">NOMOR HP</th>
										<th class="pb-3 px-4 py-2 text-start min-w-[175px]">FLAG AKTIF</th>
										<th class="pb-3 px-4 py-2 text-start min-w-[175px]">STATUS KELUHAN</th>
										<th class="pb-3 px-4 py-2 text-start min-w-[175px]">KELUHAN</th>
										<th class="pb-3 px-4 py-2 text-start min-w-[70px]">AKSI</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="complaint in complaints" :key="complaint.id"
										class="border-b border-dashed last:border-b-0">
										<td class="p-3 pl-0">{{ complaint.id }}</td>
										<td class="p-3">{{ complaint.nama }}</td>
										<td class="p-3">{{ complaint.email }}</td>
										<td class="p-3">{{ complaint.nomor_hp }}</td>
										<td class="p-3">{{ complaint.flag_aktif }}</td>
										<td class="p-3">{{ complaint.status_keluhan }}</td>
										<td class="p-3">{{ complaint.keluhan }}</td>
										<td class="p-3">
											<div>
												<button @click="editComplaint(complaint)"><svg
														class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
														xmlns="http://www.w3.org/2000/svg" fill="currentColor"
														viewBox="0 0 20 18">
														<path
															d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
														<path
															d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
													</svg></button>
											</div>
											<div>
												<button @click="deleteComplaint(complaint.id)">
													<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
														xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
														<path stroke="currentColor" stroke-linecap="round"
															stroke-linejoin="round" stroke-width="2"
															d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
													</svg>
												</button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Form Add -->
	<div v-if="showAddForm" class="add-form flex items-center justify-center">
		<!-- Form Add -->
		<!-- component -->
		<div class="flex items-center justify-center p-1">
			<div class="mx-auto w-full max-w-[550px]">
				<div class="-mx-3 flex flex-wrap">
					<div class="w-full px-3 sm:w-1/2">
						<div class="mb-2">
							<label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
								ID
							</label>
							<input v-model="newComplaint.id" type="text" name="fName" id="fName" placeholder="First Name"
								class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
						</div>
					</div>
					<div class="w-full px-3 sm:w-1/2">
						<div class="mb-2">
							<label for="lName" class="mb-3 block text-base font-medium text-[#07074D]">
								Nama
							</label>
							<input v-model="newComplaint.nama" type="text" name="lName" id="lName" placeholder="Last Name"
								class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
							<span v-if="errors.nama" class="error">{{ errors.nama }}</span>
						</div>
					</div>
				</div>
				<div class="mb-2">
					<label class="mb-3 block text-base font-medium text-[#07074D]">
						Email
					</label>
					<input v-model="newComplaint.email" type="email" placeholder="5" min="0"
						class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
					<span v-if="errors.email" class="error">{{ errors.email }}</span>
				</div>
				<div class="mb-2">
					<label class="mb-3 block text-base font-medium text-[#07074D]">
						Nomor Hp
					</label>
					<input v-model="newComplaint.nomor_hp" type="text" placeholder="5" min="0"
						class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
					<span v-if="errors.nomor_hp" class="error">{{ errors.nomor_hp }}</span>
				</div>
				<div class="-mx-3 flex flex-wrap">
					<div class="w-full px-3 sm:w-1/2">
						<div class="mb-2">
							<div class="mb-2">
								<label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
									Flag Aktif
								</label>
								<input v-model="newComplaint.flag_aktif" type="text"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
							</div>
						</div>
					</div>
					<div class="w-full px-3 sm:w-1/2">
						<label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
							Status Keluhan
						</label>
						<select v-model="newComplaint.status_keluhan"
							class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
							<option disabled selected>Status Keluhan</option>
							<option value="0">Received</option>
							<option value="1">On Proces</option>
							<option value="2">Done</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="mb-3 block text-base font-medium text-[#07074D]">
							Keluhan
						</label>
						<input v-model="newComplaint.keluhan" type="text" placeholder="5" min="0"
							class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
					</div>
				</div>
				<button @click="addComplaint()"
					class="hover:shadow-form rounded-md bg-dark py-3 px-8 text-center text-base font-semibold text-white outline-none">
					Submit
				</button>
				<button @click="showAddForm = false"
					class="hover:shadow-form rounded-md bg-dark py-3 px-8 ml-2 text-center text-base font-semibold text-white outline-none">
					Cancel
				</button>
			</div>
		</div>
	</div>
	<!-- Form Edit -->
	<div v-if="showEditForm" class="edit-form flex items-center justify-center">
		<div class="flex items-center justify-center p-1">
			<div class="mx-auto w-full max-w-[550px]">
				<div class="-mx-3 flex flex-wrap">
					<div class="w-full px-3 sm:w-1/2">
						<div class="mb-2">
							<label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
								ID
							</label>
							<input v-model="editedComplaint.id" type="text" name="fName" id="fName" placeholder="First Name"
								class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
						</div>
					</div>
					<div class="w-full px-3 sm:w-1/2">
						<div class="mb-2">
							<label for="lName" class="mb-3 block text-base font-medium text-[#07074D]">
								Nama
							</label>
							<input v-model="editedComplaint.nama" type="text" name="lName" id="lName"
								placeholder="Last Name"
								class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
						</div>
					</div>
				</div>
				<div class="mb-2">
					<label class="mb-3 block text-base font-medium text-[#07074D]">
						Email
					</label>
					<input v-model="editedComplaint.email" type="email" placeholder="5" min="0"
						class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
				</div>
				<div class="mb-2">
					<label class="mb-3 block text-base font-medium text-[#07074D]">
						Nomor Hp
					</label>
					<input v-model="editedComplaint.nomor_hp" type="text" placeholder="5" min="0"
						class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
				</div>
				<div class="-mx-3 flex flex-wrap">
					<div class="w-full px-3 sm:w-1/2">
						<div class="mb-2">
							<div class="mb-2">
								<label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
									Flag Aktif
								</label>
								<input v-model="editedComplaint.flag_aktif" type="text"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
							</div>
						</div>
					</div>
					<div class="w-full px-3 sm:w-1/2">
						<label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
							Status Keluhan
						</label>
						<select v-model="editedComplaint.status_keluhan"
							class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
							<option disabled selected>Status Keluhan</option>
							<option value="0">Received</option>
							<option value="1">On Proces</option>
							<option value="2">Done</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="mb-3 block text-base font-medium text-[#07074D]">
							Keluhan
						</label>
						<input v-model="editedComplaint.keluhan" type="text" placeholder="5" min="0"
							class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
					</div>
				</div>
				<button @click="addComplaint()"
					class="hover:shadow-form rounded-md bg-dark py-3 px-8 text-center text-base font-semibold text-white outline-none">
					Submit
				</button>
				<button @click="showEditForm = false"
					class="hover:shadow-form rounded-md bg-dark py-3 px-8 ml-2 text-center text-base font-semibold text-white outline-none">
					Cancel
				</button>
			</div>
		</div>
	</div>
</template>
  
<script>

import axios from 'axios'
export default {
	data() {
		return {
			complaints: [],
			showEditForm: false,
			showAddForm: false,
			newComplaint: {
				id: '',
				nama: '',
				email: '',
				nomor_hp: '',
				flag_aktif: '',
				status_keluhan: '',
				keluhan: ''
			},
			editedComplaint: {},
			errors: {},
			// exportXlsx:[]
		};
	},
	created() {
		this.fetchComplaints();
	},
	methods: {
		fetchComplaints() {
			axios.get('/api/keluhan_pelanggan')
				.then(response => {
					this.complaints = response.data;
				})
				.catch(error => {
					console.error(error);
				});
		},
		exportXlsx() {
			window.open('/api/exportxlsx');
		},
		exportTxt() {
			window.open('/api/exporttxt');
		},
		exportCsv() {
			window.open('/api/exportcsv');
		},
		exportPdf() {
			window.open('/api/exportpdf');
		},
		addComplaint() {
			axios.post('/api/keluhan_pelanggan', this.newComplaint)
				.then(response => {
					console.log('Keluhan berhasil ditambahkan', response.data);
					this.showAddForm = false;
					this.fetchComplaints();
					this.newComplaint = { id: '', nama: '', email: '', nomor_hp: '', flag_aktif: '', status_keluhan: '', keluhan: '' };
				})
				.catch(error => {
					// Handle error
					if (error.response.status === 422) {
						this.errors = error.response.data.errors;
					} else {
						console.error('Gagal menambahkan keluhan', error);
					}
				});
		},
		editComplaint(complaint) {
			this.editedComplaint = { ...complaint };
			this.showEditForm = true;
		},
		updateComplaint() {
			axios.put(`/api/keluhan_pelanggan/${this.editedComplaint.id}`, this.editedComplaint)
				.then(response => {
					console.log('Keluhan berhasil diubah', response.data);
					this.showEditForm = false;
					this.fetchComplaints();
				})
				.catch(error => {
					console.error('Gagal mengubah keluhan', error);
				});
		},
		deleteComplaint(id) {
			if (confirm('Apakah Anda yakin ingin menghapus keluhan ini?')) {
				axios.delete(`/api/keluhan_pelanggan/${id}`)
					.then(response => {
						console.log('Keluhan berhasil dihapus', response.data);
						this.fetchComplaints();
					})
					.catch(error => {
						console.error('Gagal menghapus keluhan', error);
					});
			}
		}

	}
};

</script>
<style>
.error {
	color: red;
	font-size: 12px;
}
</style>