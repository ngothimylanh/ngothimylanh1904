#include<bits/stdc++.h>
#include <stdio.h>
#define max 20
using namespace std;
int x[max];int n,k,d=0;
void XuatNghiem()  
{
	d++;
	cout<<d<<":   ";
    for(int i=1;i<=k;i++)    cout<<x[i]<<"  ";
    cout<<endl;
}
void ToHop(int i)  
{
    for(int j=x[i-1]+1;j<=n-k+i;j++)  
	{
        x[i]=j;
        if(i==k)    XuatNghiem();
        else
        ToHop(i+1);
    }
}
int main()  
{
    freopen("BT4.inp","r",stdin);
    freopen("BT4.out","w",stdout);
    cin>>n>>k;
    x[0]=0;ToHop(1);
    cout<<"so to hop:  "<<d; 
}
