

accounts = {
    "angga01": "12345",
    "budi02": "12345",
    "sinta03": "12345"
}


 

profiles = {
    "angga01": {
        "nama": "Anggara",
        "nomor_telepon": "081234567890",
        "peran": "User"
    },

    "budi02": {
        "nama": "Budi",
        "nomor_telepon": "082345678901",
        "peran": "User"
    },

    "sinta03": {
        "nama": "Sinta",
        "nomor_telepon": "083456789012",
        "peran": "User"
    }
}


 

expenses = [
    {
        "id": "EXP001",
        "user_id": "angga01",
        "kategori": "Makanan",
        "jumlah": 25000,
        "keterangan": "Makan siang"
    },

    {
        "id": "EXP002",
        "user_id": "angga01",
        "kategori": "Transportasi",
        "jumlah": 15000,
        "keterangan": "Bensin"
    },

    {
        "id": "EXP003",
        "user_id": "angga01",
        "kategori": "Akademik",
        "jumlah": 30000,
        "keterangan": "Print tugas"
    }
]


 

menu = (
    "Login",
    "Registrasi",
    "Lihat Profil",
    "Catat Pengeluaran",
    "Lihat Pengeluaran",
    "Analisis Pengeluaran",
    "Logout",
    "Keluar"
)


 

def tampilkan_menu(status_login):

    print("\n==========================================")
    print("       SISTEM ANALISIS PENGELUARAN")
    print("==========================================")

    if status_login is None:
       
        guest_menu = menu[:2] + menu[7:]

        for i, item in enumerate(guest_menu, start=1):
            print(f"{i}. {item}")

    else:
        
        user_menu = menu[2:7]

        for i, item in enumerate(user_menu, start=1):
            print(f"{i}. {item}")

 

def registrasi():

    print("\n========== REGISTRASI ==========")

    while True:
        username = input("Masukkan ID/Username: ")

        if username in accounts:
            print("Error: Username sudah digunakan!")
        else:
            break

    while True:
        password = input("Masukkan Password: ")

        if password == "":
            print("Error: Password tidak boleh kosong!")
        else:
            break

    nama = input("Masukkan Nama: ")
    nomor_telepon = input("Masukkan Nomor Telepon: ")

     
    accounts[username] = password

   
    profiles[username] = {
        "nama": nama,
        "nomor_telepon": nomor_telepon,
        "peran": "User"
    }

    print("\nRegistrasi berhasil!")
    print(f"Username '{username}' berhasil dibuat.")


 

def login():

    print("\n========== LOGIN ==========")

    username = input("Username: ")
    password = input("Password: ")

    if username in accounts and accounts[username] == password:
        print("\nLogin berhasil!")
        print(f"Selamat datang, {profiles[username]['nama']}!")

        return username

    print("\nError: Username atau password salah!")
    return None


 

def lihat_profil(current_user):

    print("\n========== PROFIL ==========")

    profile = profiles[current_user]

    print(f"Username       : {current_user}")
    print(f"Nama           : {profile['nama']}")
    print(f"Nomor Telepon  : {profile['nomor_telepon']}")
    print(f"Peran          : {profile['peran']}")


 

def catat_pengeluaran(current_user):

    print("\n========== CATAT PENGELUARAN ==========")

    kategori = input("Kategori       : ")
    keterangan = input("Keterangan     : ")

    
    while True:
        try:
            jumlah = int(input("Jumlah (Rp)    : "))

            if jumlah <= 0:
                print("Error: Jumlah harus lebih dari 0!")
                continue

            break

        except ValueError:
            print("Error: Jumlah harus berupa angka!")

     
    nomor = len(expenses) + 1
    expense_id = f"EXP{nomor:03d}"

    new_expense = {
        "id": expense_id,
        "user_id": current_user,
        "kategori": kategori,
        "jumlah": jumlah,
        "keterangan": keterangan
    }

    expenses.append(new_expense)

    print("\nPengeluaran berhasil dicatat!")


 

def lihat_pengeluaran(current_user):

    print("\n========== DATA PENGELUARAN ==========")

    user_expenses = []

    for expense in expenses:
        if expense["user_id"] == current_user:
            user_expenses.append(expense)

    if not user_expenses:
        print("Belum ada data pengeluaran.")
        return

    for expense in user_expenses:

        print("------------------------------------------")
        print(f"ID           : {expense['id']}")
        print(f"Kategori     : {expense['kategori']}")
        print(f"Jumlah       : Rp{expense['jumlah']}")
        print(f"Keterangan   : {expense['keterangan']}")


 

def analisis_pengeluaran(current_user):

    print("\n========== ANALISIS PENGELUARAN ==========")

    user_expenses = []

     
    for expense in expenses:
        if expense["user_id"] == current_user:
            user_expenses.append(expense)

    if not user_expenses:
        print("Belum ada data untuk dianalisis.")
        return
 
    total = 0

    for expense in user_expenses:
        total += expense["jumlah"]

    print(f"Total Pengeluaran : Rp{total}")

    
    category_total = {}

    for expense in user_expenses:

        kategori = expense["kategori"]
        jumlah = expense["jumlah"]

        if kategori not in category_total:
            category_total[kategori] = 0

        category_total[kategori] += jumlah

    print("\nPengeluaran Berdasarkan Kategori:")

    for kategori, jumlah in category_total.items():
        print(f"- {kategori}: Rp{jumlah}")

    
    terbesar = user_expenses[0]

    for expense in user_expenses:
        if expense["jumlah"] > terbesar["jumlah"]:
            terbesar = expense

    print("\nPengeluaran Terbesar:")
    print(f"Kategori   : {terbesar['kategori']}")
    print(f"Jumlah     : Rp{terbesar['jumlah']}")
    print(f"Keterangan : {terbesar['keterangan']}")


 

current_user = None


while True:

    tampilkan_menu(current_user)

   

    if current_user is None:

        while True:
            try:
                pilihan = int(input("\nPilih menu: "))

                if pilihan < 1 or pilihan > 3:
                    print("Error: Pilihan tidak tersedia!")
                    continue

                break

            except ValueError:
                print("Error: Masukkan angka!")

      
        if pilihan == 1:
            current_user = login()

       
        elif pilihan == 2:
            registrasi()

        
        elif pilihan == 3:
            print("\nProgram selesai.")
            break


     

    else:

        while True:
            try:
                pilihan = int(input("\nPilih menu: "))

                if pilihan < 1 or pilihan > 5:
                    print("Error: Pilihan tidak tersedia!")
                    continue

                break

            except ValueError:
                print("Error: Masukkan angka!")

    
        if pilihan == 1:
            lihat_profil(current_user)

       
        elif pilihan == 2:
            catat_pengeluaran(current_user)

         
        elif pilihan == 3:
            lihat_pengeluaran(current_user)

     
        elif pilihan == 4:
            analisis_pengeluaran(current_user)

      
        elif pilihan == 5:
            print("\nLogout berhasil.")
            current_user = None