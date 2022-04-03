import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Seguro } from '../model/Seguro';
import { environment } from 'src/environments/environment';
import { OnlineOfflineService } from './online-offline.service';
import { Observable } from 'rxjs/internal/Observable';
import Dexie from 'dexie';

@Injectable({
  providedIn: 'root'
})
export class SeguroService {
  [x: string]: any;
  private API_SEGUROS = 'http://localhost:9000/';
  private db: Dexie;
  private table: Dexie.Table<Seguro, any> = null;

  constructor(
    private http: HttpClient,
    private onlineOfflineService: OnlineOfflineService,
  ) {
    this.ouvirStatusConexao();
    this.iniciarIndexedDb();
  }

  private iniciarIndexedDb(){
    this.db = new Dexie('db-seguros');
    this.db.version(1).stores({
      seguro: 'id'
    });
    this.table = this.db.table('seguro');
  }

  private async salvarIndexedDb(seguro: Seguro){
    try {
      await this.table.add(seguro);
      const todosSeguros: Seguro[] = await this.table.toArray();
      console.log('Seguro saldo no indexed', todosSeguros);
    } catch (error) {
      console.log('erro ao salvar no indexed', error);
    }
  }

  private async enviarIndexedDbParaApi(){
    const todosSeguros: Seguro[] = await this.table.toArray();

    for (const seguro of todosSeguros) {
      this.salvarAPI(seguro);
      await this.table.delete(seguro.id);
      console.log(`seguro com o id ${seguro.id} foi excluido com sucesso`);
    }
  }


  public salvarAPI(seguro: Seguro){
    this.http.post(this.API_SEGUROS + 'api/seguros', seguro)
    .subscribe(
      () => alert('Seguro foi cadastrado com sucesso.'),
      (err) => console.log('erro ao cadastrar')
    )
  }

  cadastrar(seguro: Seguro){
    if (this.onlineOfflineService.isOnline){
      this.salvarAPI(seguro);
    } else {
      this.salvarIndexedDb(seguro);
    }
  }

  listar(): Observable<Seguro[]> {
    return this.http.get<Seguro[]>(this.API_SEGUROS + 'api/seguros');
  }

  private ouvirStatusConexao(){
    this.onlineOfflineService.statusConexao
      .subscribe(online => {
        if(online){
          this.enviarIndexedDbParaApi();
        } else {
          console.log('estou offline')
        }
      })
  }
}
