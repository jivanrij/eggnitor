import{_}from"./AppLayout-4111806d.js";import{q as x,k as a,d as f,o as c,c as h,w as v,a as t,e as i,h as w,u as y,F as g,b as k}from"./app-2b926828.js";import b from"./Row-dd256a17.js";import"./Options-fe401567.js";const u=x.create({baseURL:"",withCredentials:!0});u.interceptors.response.use(e=>e,function(e){return e.response&&[401,419].includes(e.response.status),Promise.reject(e)});const S={async updateStatus(e){return await u.get("/sanctum/csrf-cookie"),u.post("/update-status",e)}},B={class:"py-12"},E={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},j={class:"bg-white overflow-hidden shadow-xl sm:rounded-lg lg:p-8"},C={class:"px-4 sm:px-6 lg:px-8"},q={class:"mt-8 flow-root"},A={class:"-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"},F={class:"inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"},L={role:"list",class:"divide-y divide-gray-100 mb-44"},H={__name:"Index",props:{houses:{type:Array,required:!0}},setup(e){const l=e;a(()=>0),a(()=>0),a(()=>0),a(()=>0);let r=f(l.houses);const d=(s,n)=>{r.value.forEach((o,p)=>{o.key===n&&(r.value[p].status=s,S.updateStatus({houseKey:n,week:o.week,year:o.year,status:s}).then(m=>{console.log(m)}))})};return(s,n)=>(c(),h(_,{title:"Status per house"},{default:v(()=>[t("div",B,[t("div",E,[t("div",j,[t("div",C,[t("div",q,[t("div",A,[t("div",F,[t("ul",L,[(c(!0),i(g,null,w(y(r),o=>(c(),i("li",{key:o.id,class:"flex items-center justify-between gap-x-6 py-5"},[k(b,{house:o,onUpdateStatusEvent:d},null,8,["house"])]))),128))])])])])])])])])]),_:1}))}};export{H as default};