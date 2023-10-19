#include<bits/stdc++.h>
using namespace std;
int n,a[10001];
void Xuat(int a[])
{
    for (int i=1;i<=n;i++)
    cout<<a[i]<<" ";  
    cout<<endl;            
}
void DeQuy(int i)
{
    for(int j=0;j<=1;j++)
	{
        a[i]=j;
        if(i==n)       Xuat(a);
        else  DeQuy(i+1);    
    }
}
int main()
{
    cin>>n;
    DeQuy(1);
}  
