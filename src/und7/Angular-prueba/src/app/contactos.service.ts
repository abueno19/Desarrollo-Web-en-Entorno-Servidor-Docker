import { Inject, Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Contacto } from "./model/contactos";
import { HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";

const httpOptions = {
  headers: new HttpHeaders({
    "Content-Type": "application/json",
    Authorization: "my-auth-token"
  })
};
@Injectable()
export class ContactosService {
  constructor(
    private http: HttpClient,
  ){}
  getContactos(): Observable<Contacto[]> {
    return this.http.get<Contacto[]>("http://192.168.115.58/dwes/ud9/ContactosApp/public/");
  }
  getContacto(id: number): Observable<Contacto> {
    return this.http.get<Contacto>("http://localhost:3000/contactos/" + id);
  }
  addContacto(contacto: Contacto): Observable<Contacto> {
    return this.http.post<Contacto>(
      "http://localhost:3000/contactos",
      contacto,
      httpOptions
    );
  }
  deleteContacto(id: number): Observable<Contacto> {
    return this.http.delete<Contacto>(
      "http://localhost:3000/contactos/" + id,
      httpOptions
    );
  }
  updateContacto(contacto: Contacto): Observable<Contacto> {
    return this.http.put<Contacto>(
      "http://localhost:3000/contactos/" + contacto.id,
      contacto,
      httpOptions
    );
  }
}