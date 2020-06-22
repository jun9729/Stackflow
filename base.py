#DB에 insert하는 py 파일====================================================================
import time
import random
import matplotlib.pyplot as plt 
import pandas as pd
import dfselect
import requests
from bs4 import BeautifulSoup
import lxml
from sqlalchemy import create_engine
import pymysql
import cacul

pymysql.install_as_MySQLdb()
import MySQLdb

try:
    engine = create_engine("mysql+mysqldb://gunslord:" + "gm2580!!" + "@nas.6cats.co.kr:7001/home",encoding='utf-8')
    conn = engine.connect()
    
except:
    print("error")


#snapshot 시세현황 크롤링------------------------------------------------------------------
def sise_crawl(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Main.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=&NewMenuID=101&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')


    contents=soup.select('div[id = svdMainGrid1] > table > tbody > tr ')
    col=[]
    row=[]
    jong=[]

   
    for content in contents:
        ths=content.find_all("th")
            
        
        for td in ths:
            if '시가총액(상장예정포함)' in td.text:
                col.append("시가총액(상장예정포함)") 
            elif '시가총액(보통주)' in td.text:
                col.append("시가총액(보통주)")
            elif '유동주식수/비율'  in td.text:
                col.append("유동주식수/비율")  
            else:
                col.append(td.text)
        jong.append(str)   

            
               
    for content in contents:
        tds=content.find_all("td")
            
        
        for td in tds:
                
            row.append(td.text)  


    df = pd.DataFrame(list(dict(zip(col,row)).items()),columns = ['key_1','value_1'])
    df['jongcode'] = str

    return df

#snapshot 실적이슈 크롤링----------------------------------------------------------------------------------------------
def siljuck_crawl(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Main.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=&NewMenuID=101&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = svdMainGrid2] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)



    contents=soup.select('div[id = svdMainGrid2] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','jongcode'])
    return df



def unyong_crawl(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Main.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=&NewMenuID=101&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = svdMainGrid3] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)

    contents=soup.select('div[id = svdMainGrid3] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','jongcode'])
    return df  


def juju_crawl(str):  
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Main.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=&NewMenuID=101&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = svdMainGrid4] > table > thead > tr > th')

    
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)


    contents=soup.select('div[id = svdMainGrid4] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','jongcode'])
    return df  





def jujugubun_crawl(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Main.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=&NewMenuID=101&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = svdMainGrid5] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)

    contents=soup.select('div[id = svdMainGrid5] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','jongcode'])
    return df  




def pogal_crawl_y_y(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=D&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divSonikY] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)

    dfcontent.append(str)
    
    alldfcontents.append(dfcontent)


    contents=soup.select('div[id = divSonikY] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','A6','A7','jongcode'])
    return df      

def pogal_crawl_q_y(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=D&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divSonikQ] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)


    contents=soup.select('div[id = divSonikQ] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','A6','A7','jongcode'])
    return df      

def jamusangte_crawl_y_y(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=D&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divDaechaY] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)



    contents=soup.select('div[id = divDaechaY] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','jongcode'])
    return df      

def jamusangte_crawl_q_y(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=D&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divDaechaQ] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)


    contents=soup.select('div[id = divDaechaQ] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','jongcode'])
    return df      

def hungum_crawl_y_y(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=D&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divCashY] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)



    contents=soup.select('div[id = divCashY] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','jongcode'])
    return df      

def hungum_crawl_q_y(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=D&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divCashQ] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)


    contents=soup.select('div[id = divCashQ] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','jongcode'])
    return df      

def pogal_crawl_y_b(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=B&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divSonikY] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)

    contents=soup.select('div[id = divSonikY] > table > tbody > tr ')
   
    dfcontent=[]
    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','A6','A7','jongcode'])
    return df      

def pogal_crawl_q_b(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=B&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divSonikQ] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)


    contents=soup.select('div[id = divSonikQ] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','A6','A7','jongcode'])
    return df      

def jamusangte_crawl_y_b(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=B&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divDaechaY] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)



    contents=soup.select('div[id = divDaechaY] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','jongcode'])
    return df      

def jamusangte_crawl_q_b(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=B&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divDaechaQ] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)


    contents=soup.select('div[id = divDaechaQ] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','jongcode'])
    return df      

def hungum_crawl_y_b(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=B&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divCashY] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)

    contents=soup.select('div[id = divCashY] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','jongcode'])
    return df      

def hungum_crawl_q_b(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_Finance.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=B&NewMenuID=103&stkGb=701')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = divCashQ] > table > thead > tr > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)



    contents=soup.select('div[id = divCashQ] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','jongcode'])
    return df  

def Highlight(str): 
    req=requests.get('http://comp.fnguide.com/SVO2/ASP/SVD_main.asp?pGB=1&gicode=' + str + '&cID=&MenuYn=Y&ReportGB=&NewMenuID=11&stkGb=&strResearchYN=')
    html = req.text
    soup=BeautifulSoup(html,'lxml')

    columns=soup.select('div[id = highlight_D_A] > table > thead > tr[class = td_gapcolor2] > th')

    columnlist=[]
    dfcontent=[]
    alldfcontents=[]
    for column in columns:
        dfcontent.append(column.text)
    dfcontent.append(str)
    alldfcontents.append(dfcontent)



    contents=soup.select('div[id = highlight_D_A] > table > tbody > tr ')
    dfcontent=[]
    

    try:
        for content in contents:
            tds=content.find_all("td")
            
            dfcontent.append(content.find("th").text) 
            for td in tds:
                
                dfcontent.append(td.text)
            dfcontent.append(str)
            alldfcontents.append(dfcontent)
            dfcontent=[]
    except:
        print('error')    
    df=pd.DataFrame(data=alldfcontents,columns = ['A1','A2','A3','A4','A5','A6','A7','A8','A9','jongcode'])
    return df    


def cunsen_siljuck(str): 
    
    URL = 'http://comp.fnguide.com/SVO2/json/data/01_06/01_'+ str +'_A_D.json' 
    response = requests.get(URL) 

    data2 = response.json()['comp']

    df = pd.DataFrame(data2)
    df['jongcode'] = str
    return df     

def cunsen_sige(str): 
    URL = 'http://comp.fnguide.com/SVO2/json/data/01_06/02_'+ str +'_A_D_FY1.json' 
    response = requests.get(URL) 

    data2 = response.json()['comp']

    df = pd.DataFrame(data2)
    df['jongcode'] = str
    return df    
       
def all(str):

    sise_crawl(str).to_sql(name='sise', con=engine, if_exists='append', index=False)
    unyong_crawl(str).to_sql(name='unyong', con=engine, if_exists='append', index=False)
    siljuck_crawl(str).to_sql(name='siljuck', con=engine, if_exists='append', index=False)
    juju_crawl(str).to_sql(name='juju', con=engine, if_exists='append', index=False)
    jujugubun_crawl(str).to_sql(name='jujugubun', con=engine, if_exists='append', index=False)
    pogal_crawl_y_y(str).to_sql(name='pogal_y_y', con=engine, if_exists='append', index=False)
    pogal_crawl_q_y(str).to_sql(name='pogal_q_y', con=engine, if_exists='append', index=False)
    jamusangte_crawl_y_y(str).to_sql(name='jamusangte_y_y', con=engine, if_exists='append', index=False)
    jamusangte_crawl_q_y(str).to_sql(name='jamusangte_q_y', con=engine, if_exists='append', index=False)
    hungum_crawl_y_y(str).to_sql(name='hungum_y_y', con=engine, if_exists='append', index=False)
    hungum_crawl_q_y(str).to_sql(name='hungum_q_y', con=engine, if_exists='append', index=False)
    pogal_crawl_y_b(str).to_sql(name='pogal_y_b', con=engine, if_exists='append', index=False)
    pogal_crawl_q_b(str).to_sql(name='pogal_q_b', con=engine, if_exists='append', index=False)
    jamusangte_crawl_y_b(str).to_sql(name='jamusangte_y_b', con=engine, if_exists='append', index=False)
    jamusangte_crawl_q_b(str).to_sql(name='jamusangte_q_b', con=engine, if_exists='append', index=False)
    hungum_crawl_y_b(str).to_sql(name='hungum_y_b', con=engine, if_exists='append', index=False)
    hungum_crawl_q_b(str).to_sql(name='hungum_q_b', con=engine, if_exists='append', index=False)
    cunsen_siljuck(str).to_sql(name='cunsen_siljuck', con=engine, if_exists='append', index=False)
    cunsen_sige(str).to_sql(name='cunsen_sige', con=engine, if_exists='append', index=False)
    Highlight(str).to_sql(name='Highlight', con=engine, if_exists='append', index=False)





dataset = pd.read_excel('kosdaq.xls',converters={'종목코드':str,'업종코드':str})


dataset = dataset.drop(dataset[dataset['업종코드'] == '116601'].index)
dataset = dataset.drop(dataset[dataset['업종코드'] == '116409'].index)
dataset = dataset.drop(dataset[dataset['업종코드'] == '116501'].index)
dataset = dataset.drop(dataset[dataset['업종코드'] == '116502'].index)
dataset = dataset.drop(dataset[dataset['업종코드'] == '116401'].index)
dataset = dataset.drop(dataset[dataset['업종코드'] == '116402'].index)

# dfselect.dd('cunsen_sige')
# dfselect.dd('cunsen_siljuck')
# dfselect.dd('hungum_q_b')
# dfselect.dd('hungum_q_y')
# dfselect.dd('hungum_y_b')
# dfselect.dd('hungum_y_y')
# dfselect.dd('jamusangte_q_b')
# dfselect.dd('jamusangte_q_y')
# dfselect.dd('jamusangte_y_b')
# dfselect.dd('jamusangte_y_y')
# dfselect.dd('juju')
# dfselect.dd('jujugubun')
# dfselect.dd('pogal_q_b')
# dfselect.dd('pogal_q_y')
# dfselect.dd('pogal_y_b')
# dfselect.dd('pogal_y_y')
# dfselect.dd('siljuck')
# dfselect.dd('sise')
# dfselect.dd('unyong')
# dfselect.dd('Highlight')


dfselect.de('data1')
dfselect.re('1')
dfselect.de2('data2')
dfselect.dd('rim1')
dfselect.dd('final')
dfselect.dd('result1')

dlist = dataset['종목코드'].to_numpy()
for i in range(0,1):
    
    print( i,"/",len(dlist),":",'A'+dlist[i])
    # all('A'+dlist[i]) #웹크롤링
    cacul.start("'"+'A' + dlist[i] + "'") #크롤링 기반으로 final 작성 
    




conn.close()  




