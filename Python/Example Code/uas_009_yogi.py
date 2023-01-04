from flask import Flask, render_template, request, redirect, url_for, session
from flask_mysqldb import MySQL
from werkzeug.utils import secure_filename
import MySQLdb.cursors
import os

application = Flask(__name__)
application.secret_key = 'bebas'
application.config['MYSQL_HOST'] = 'localhost'
application.config['MYSQL_USER'] = 'root'
application.config['MYSQL_PASSWORD'] = ''
application.config['MYSQL_DB'] = 'komikonline'
mysql = MySQL(application)

application.config['UPLOAD_FOLDER'] = os.path.realpath('.') + '/static/uploads'
application.config['ALLOWED_IMAGE_EXTENSIONS'] = ['JPEG', 'JPG', 'PNG', 'GIF']
application.config['MAX_CONTENT_PATH'] = 10000000

conn = cursor = None

def openDB():
    global cursor
    cursor = mysql.connection.cursor()

def closeDB():
    global cursor
    cursor.close()

def allowed_image(filename):
    if not "." in filename:
        return false
    ext = filename.rsplit(".", 1)[1]
    if ext.upper() in application.config["ALLOWED_IMAGE_EXTENSIONS"]:
        return True
    else:
        return False

@application.route('/')
def index():
    openDB()
    cursor.execute("SELECT * FROM bkomik")
    datak = cursor.fetchall()
    cursor.execute("SELECT * FROM skomik")
    dataa = cursor.fetchall()
    closeDB()
    return render_template('index.html', datak=datak, dataa=dataa)

@application.route('/admin')
def admin():
    if 'loggedin' in session:
        openDB()
        cursor.execute("SELECT * FROM bkomik")
        datak = cursor.fetchall()
        cursor.execute("SELECT * FROM skomik")
        dataa = cursor.fetchall()
        closeDB()
        return render_template('admin.html', datak=datak, dataa=dataa, nama=session['nama'])
    else:
        msg = "Silahkan Login Terlebih Dahulu"
        return render_template('login.form.html', msg=msg)

@application.route('/login', methods=['GET', 'POST'])
def login():
    msg = ''
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form:
        username = request.form['username']
        password = request.form['password']
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute('SELECT * FROM akun WHERE username = %s AND password = %s', (username, password,))
        data = cursor.fetchone()
        if data:
            session['loggedin'] = True
            session['username'] = data['username']
            session['nama'] = data['nama']
            session['password'] = data['password']
            session['email'] = data['email']
            session['alamat'] = data['alamat']
            session['notlp'] = data['notlp']
            return redirect(url_for('admin'))
        else:
            msg = 'Incorrect username/password!'
    return render_template('login_form.html', msg=msg)

@application.route('/logout')
def logout():
    session.pop('loggedin', None)
    session.pop('nama', None)
    session.pop('username', None)
    return redirect(url_for('index'))

@application.route('/signup', methods=['GET', 'POST'])
def signup():
    msg = ''
    if request.method == 'POST' and 'username' in request.form and 'email' in request.form and 'password' in request.form:
        username = request.form['username']
        email = request.form['email']
        password = request.form['password']
        nama = request.form['nama']
        alamat = request.form['alamat']
        notelp = request.form['notelp']
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute('SELECT * FROM pengguna WHERE username = %s', (username,))
        data = cursor.fetchone()
        if data:
            msg = 'Account already exists!'
        elif not username or not password or not email:
            msg = 'Please fill out the form!'
        else:
            cursor.execute('INSERT INTO akun VALUES (%s,%s,%s,%s,%s)', (username, nama, password, email, alamat, notelp))
            mysql.connection.commit()
            msg = 'You have successfully registered!'
        return redirect(url_for('index'))
    elif request.method == 'POST':
        msg = 'Please fill out the form!'
    return render_template('signup_form.html', msg=msg)

@application.route('/profil', methods=['GET', 'POST'])
def profil():
    if 'loggedin' in session:
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute('SELECT * FROM akun WHERE username = %s', (session['username'],))
        data = cursor.fetchall()
        return render_template("profil_form.html", data=data,
                               nama=session['nama'],
                               username=session['username'],
                               password=session['password'],
                               email=session['email'],
                               alamat=session['alamat'],
                               notlp=session['notlp']
                               )
    return redirect(url_for('login'))

@application.route('/tambah', methods=['GET', 'POST'])
def tambah():
    if request.method == 'POST':
        id = request.form['id']
        judul = request.form['judul']
        mangaka = request.form['mangaka']
        penerbit = request.form['penerbit']
        stockk = request.form['stockk']
        f = request.files['file']

        if f.filename == "":
            msg = "Harap upload gambar buku!"
            return render_template('tambah_form.html', msg=msg)

        if allowed_image(f.filename):
            filename = application.config['UPLOAD_FOLDER'] + '/' + secure_filename(f.filename)
        else:
            msg = "Format tidak diperbolehkan!"
            return render_template('tambah_form.html', msg=msg)
        try:
            f.save(filename)
            openDB()
            cursor.execute('INSERT INTO bkomik VALUES (%s,%s,%s,%s,%s,0)',
                           (id, judul, mangaka, penerbit, secure_filename(f.filename),))
            mysql.connection.commit()
            cursor.execute('INSERT INTO skomik VALUES (%s,%s)',
                           (id, stockk,))
            mysql.connection.commit()
            closeDB()
            return redirect(url_for('admin'))
        except:
            msg = "Terjadi kesalahan, silahkan diulangi"
            return render_template('tambah_form.html', msg=msg)

    else:
        return render_template('tambah_form.html', nama=session['nama'])


@application.route('/ubah/<id>', methods=['GET', 'POST'])
def ubah(id):
    openDB()
    result = cursor.execute('SELECT * FROM bkomik WHERE id = %s', (id,))
    data = cursor.fetchone()

    if request.method == 'POST':
        id = request.form['id']
        judul = request.form['judul']
        mangaka = request.form['mangaka']
        penerbit = request.form['penerbit']
        f = request.files['file']

        if f.filename == "":
            msg = "Harap upload gambar komik!"
            result = cursor.execute('SELECT * FROM bkomik WHERE id = %s', (id,))
            dataa = cursor.fetchone()
            return render_template('ubah_form.html', msg=msg, data=data)

        if allowed_image(f.filename):
            filename = application.config['UPLOAD_FOLDER'] + '/' + secure_filename(f.filename)
        else:
            msg = "Format tidak diperbolehkan!"
            result = cursor.execute('SELECT * FROM bkomik WHERE id = %s', (id,))
            dataa = cursor.fetchone()
            return render_template('ubah_form.html', msg=msg)
        try:
            f.save(filename)
            cursor.execute('''UPDATE bkomik SET judul= %s, mangaka= %s, penerbit= %s, gambar= %s WHERE id= %s''',
                           (judul, mangaka, penerbit, secure_filename(f.filename), id,))
            mysql.connection.commit()
            closeDB()
            return redirect(url_for('admin'))
        except:
            msg = "Terjadi kesalahan, silahkan diulangi"
            result = cursor.execute('SELECT * FROM bkomik WHERE id = %s', (id,))
            datak = cursor.fetchone()
            return render_template('ubah_form.html', msg=msg, data=data)

    else:
        closeDB()
        return render_template('ubah_form.html', data=data, nama=session['nama'])

@application.route('/ubahstock/<id>', methods=['GET', 'POST'])
def ubahstock(id):
    openDB()
    result = cursor.execute('SELECT * FROM skomik WHERE id = %s', (id,))
    data = cursor.fetchone()
    if request.method == 'POST':
        id = request.form['id']
        stockk = request.form['stockk']
        cursor.execute('''UPDATE skomik SET stockk= %s WHERE id= %s''',
                           (stockk, id,))
        mysql.connection.commit()
        closeDB()
        return redirect(url_for('admin'))
    return render_template('ubahstock_form.html', data=data, nama=session['nama'])


@application.route('/hapus/<id>', methods=['GET', 'POST'])
def hapus(id):
    openDB()
    cursor.execute('DELETE FROM bkomik WHERE id= %s', (id,))
    mysql.connection.commit()
    cursor.execute('DELETE FROM skomik WHERE id= %s', (id,))
    mysql.connection.commit()
    closeDB()
    return redirect(url_for('admin'))

@application.route('/buy/<id>', methods=['GET', 'POST'])
def buy(id):
    if request.method == 'POST':
        id = request.form['id']
        openDB()
        result = cursor.execute('SELECT * FROM bkomik WHERE id = %s', (id,))
        data = cursor.fetchone()
        closeDB()
    else:
        openDB()
        cursor.execute('''UPDATE bkomik SET bkomik.kondisi= -1 WHERE id= %s''',
                       ( id,))
        mysql.connection.commit()
        closeDB()
        return redirect(url_for('index'))


if __name__ == '__main__':
    application.run(debug=True)

